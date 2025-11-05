<!-- resources/views/components/gold-price.blade.php -->
<section 
    id="harga-emas" 
    class="bg-white py-8"
    x-data="goldChartComponent()"
    x-init="initChart()"
>
    <div class="max-w-6xl mx-auto px-4">
        <!-- Chart Container -->
        <div class="h-56 relative">
            <canvas id="goldChart"></canvas>
        </div>

        <!-- Date Labels -->
        <div class="flex justify-between mt-4 px-2">
            <template x-for="(label, i) in fullDates" :key="i">
                <div class="text-xs text-gray-600 text-center" 
                     x-text="label" 
                     :style="`width: ${100 / fullDates.length}%`">
                </div>
            </template>
        </div>
    </div>
</section>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  document.addEventListener('alpine:init', () => {
    Alpine.data('goldChartComponent', () => ({
      chart: null,
      timer: null,
      apiBaseUrl: '{{ env('API_BASE_URL', 'https://pms-testing.infokejadiansemarang.com/api/landing-page') }}',
      // local plain copies for the labels under the chart
      fullDates: [],

      // --- helpers ---------------------------------------------------------
      _plain(obj) {
        // deep clone to strip reactivity/circulars
        return JSON.parse(JSON.stringify(obj));
      },
      _monthName(idx) {
        const m = ['Januari','Februari','Maret','April','Mei','Juni',
                   'Juli','Agustus','September','Oktober','November','Desember'];
        return m[idx] ?? '';
      },

      async fetchDataAndRender() {
        // 1) fetch
        const res = await fetch(`${this.apiBaseUrl}/charts`, { cache: 'no-store' });
        if (!res.ok) throw new Error(`HTTP ${res.status}`);
        const json = await res.json();

        // 2) build plain arrays (no Alpine refs)
        const prices = [];
        const labels = [];     // short (day number) for X axis
        const fullDates = [];  // full dates for tooltip + below labels

        for (const item of json) {
          // handle both {date: 'YYYY-MM-DD'} or ISO strings with time
          const d = new Date(item.date);
          const day = String(d.getDate());
          labels.push(day);
          prices.push(Number(item.price) || 0);
          fullDates.push(`${d.getDate()} ${this._monthName(d.getMonth())}`);
        }

        // update the labels below the chart (Alpine DOM)
        this.fullDates = this._plain(fullDates);

        // 3) init or update the chart with *plain* data
        const dataPlain = {
          labels: this._plain(labels),
          datasets: [{
            label: 'Harga Emas',
            data: this._plain(prices),
            borderColor: '#100F0F',
            backgroundColor: 'rgba(11, 36, 58, 0.1)',
            borderWidth: 2,
            fill: true,
            tension: 0,
            pointBackgroundColor: '#100F0F',
            pointBorderColor: '#FFFFFF',
            pointBorderWidth: 2,
            pointRadius: 0,
            pointHoverRadius: 4,
            pointHoverBackgroundColor: '#100F0F',
            pointHoverBorderColor: '#FFFFFF',
            pointHoverBorderWidth: 2
          }]
        };

        if (!this.chart) {
          const ctx = document.getElementById('goldChart')?.getContext('2d');
          if (!ctx) return;

          const self = this; // avoid using Alpine proxy in callbacks

          this.chart = new window.Chart(ctx, {
            type: 'line',
            data: dataPlain,
            options: {
              responsive: true,
              maintainAspectRatio: false,
              plugins: {
                legend: { display: false },
                tooltip: {
                  enabled: true,
                  backgroundColor: 'rgba(0, 0, 0, 0.8)',
                  titleColor: '#fff',
                  bodyColor: '#fff',
                  padding: 10,
                  displayColors: false,
                  callbacks: {
                    title(items) {
                      if (!items || !items.length) return '';
                      const idx = items[0].dataIndex ?? 0;
                      // read from a plain array stored on chart instance
                      const titles = items[0].chart.$fullDates || [];
                      return titles[idx] ?? '';
                    },
                    label(ctx) {
                      const y = (ctx && ctx.parsed && typeof ctx.parsed.y === 'number')
                        ? ctx.parsed.y : 0;
                      try {
                        return 'Rp ' + y.toLocaleString('id-ID');
                      } catch {
                        return 'Rp ' + y;
                      }
                    }
                  }
                }
              },
              scales: {
                x: { grid: { display: false, drawBorder: false }, ticks: { display: false } },
                y: { display: false, grid: { display: false } }
              },
              interaction: { mode: 'nearest', axis: 'x', intersect: false },
              elements: { point: { radius: 0, hoverRadius: 4 }, line: { tension: 0 } },
              layout: { padding: { left: 0, right: 0, top: 10, bottom: 10 } }
            }
          });

          // store plain titles for tooltip (no Alpine refs)
          this.chart.$fullDates = this._plain(fullDates);
        } else {
          // safe update path
          this.chart.data.labels = this._plain(labels);
          this.chart.data.datasets[0].data = this._plain(prices);
          this.chart.$fullDates = this._plain(fullDates);
          // guard update inside try to avoid silent throw
          try { this.chart.update(); } catch (e) { console.error('Chart update error:', e); }
        }
      },

      async initChart() {
        try {
          await this.fetchDataAndRender();
        } catch (e) {
          console.error('Fetch Error on init:', e);
        }

        // clear old timer if any (avoid duplicates)
        if (this.timer) clearInterval(this.timer);
        this.timer = setInterval(async () => {
          try { await this.fetchDataAndRender(); } 
          catch (e) { console.error('Fetch Error (interval):', e); }
        }, 60_000); // 1 minute

        // cleanup on component destroy
        this.$watch('$el', (el, oldEl) => {
          // nothing; placeholder to illustrate Alpine lifecycle usage
        });
        this.$nextTick(() => {
          // when Alpine tears down the component
          this.$root.addEventListener('alpine:destroy', () => {
            if (this.timer) clearInterval(this.timer);
            if (this.chart) { try { this.chart.destroy(); } catch {} }
          }, { once: true });
        });
      }
    }));
  });
  </script>
@endpush

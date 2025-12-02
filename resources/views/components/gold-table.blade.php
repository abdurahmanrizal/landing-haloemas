<div class="flex flex-col gap-1 w-full px-4 lg:px-0 max-w-6xl">
    <div class="flex flex-col lg:flex-row justify-between mb-4">
        <h1 class="text-xl font-semibold italic">Harga Emas Perhiasan</h1>
        <p class="text-md font-normal italic">
            Terakhir Update:
            @if (isset($lastUpdate))
                {{ \Carbon\Carbon::parse($lastUpdate)->locale('id')->isoFormat('DD MMMM YYYY • HH:mm') }}
            @else
                -
            @endif
        </p>
    </div>
    <div class="overflow-x-auto shadow max-h-[400px] overflow-y-auto pe-2">
        <table class="min-w-full border border-gray-200">
            <thead class="bg-[#F7F2F6]">
                <tr class="text-left border-b">
                    <th class="py-3 px-4 font-semibold text-gray-700">Kadar Karat</th>
                    <th class="py-3 px-4 font-semibold text-gray-700">Harga per Gram</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @if (isset($golds) && count($golds) > 0)
                    @foreach ($golds as $gold)
                        <tr>
                            <td class="py-3 px-4">Emas {{ $gold['name'] }}</td>
                            <td class="py-3 px-4">Rp {{ number_format($gold['price'], 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="2" class="py-3 px-4 text-center text-gray-500">
                            Data Harga Emas belum tersedia
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

<x-layout>
    <div class="relative w-full mb-4">
        <table class="sticky top-0">
            <thead class="bg-gray-100">
                <tr>
                    @foreach($tableColumns as $column)
                        <th class="border border-gray-300 min-w-30 px-2 py-1">
                            {{ $column }}
                        </th>
                    @endforeach
                </tr>
            </thead>
        </table>
        <table>
            <tbody>
                @foreach($concats as $concat)
                    @if($concat->type == 'CH')
                        <tr class="hover:bg-green-300 bg-green-200 text-green-900">
                    @else
                            <tr class="hover:bg-gray-200">
                        @endif
                        <td class="border border-gray-300 min-w-30 px-2 py-1 text-center">
                            {{ \Carbon\Carbon::parse($concat->date)->format('d/m/Y') }}
                        </td>
                        <td class="border border-gray-300 min-w-30 px-2 py-1 text-center">{{ $concat->action }}</td>
                        <td class="border border-gray-300 min-w-30 px-2 py-1 text-center">{{ $concat->destination }}</td>
                        <td class="border border-gray-300 min-w-30 px-2 py-1 text-center">{{ $concat->km }}</td>
                        <td class="border border-gray-300 min-w-30 px-2 py-1 text-center">
                            {{ $concat->Batterie->pourcentage }}%
                        </td>
                        <td class="border border-gray-300 min-w-30 px-2 py-1 text-center">
                            {{ $concat->Batterie->difference() ?? 'N/A' }}%
                        </td>
                        <td class="border border-gray-300 min-w-30 px-2 py-1 text-center">{{ $concat->autonomie }} km</td>
                        <td class="border border-gray-300 min-w-30 px-2 py-1 text-center">{{ $concat->type }}</td>
                        <td class="border border-gray-300 min-w-30 px-2 py-1 text-center">
                            {{ $concat->reset ? 'Oui' : 'Non' }}
                        </td>
                        <td class="border border-gray-300 min-w-30 px-2 py-1 text-center">{{ $concat->distance ?? '-' }}
                        </td>
                        <td class="border border-gray-300 min-w-30 px-2 py-1 text-center">
                            {{ $concat->vitesse_moyenne ?? '-'  }}
                        </td>
                        <td class="border border-gray-300 min-w-30 px-2 py-1 text-center">
                            {{ $concat->consommation_moyenne ?? '-'  }}
                        </td>
                        <td class="border border-gray-300 min-w-30 px-2 py-1 text-center">
                            {{ $concat->consommation_totale ?? '-'  }}
                        </td>
                        <td class="border border-gray-300 min-w-30 px-2 py-1 text-center">
                            {{ $concat->energie_recuperee ?? '-'  }}
                        </td>
                        <td class="border border-gray-300 min-w-30 px-2 py-1 text-center">
                            @if(!is_null($concat->consommation_clim) && $concat->consommation_clim != 0)
                                {{ $concat->consommation_clim ?? '-'  }}
                            @else
                                -
                            @endif
                        </td>
                        <td class="border border-gray-300 min-w-30 px-2 py-1 text-center">
                            @if(!is_null($concat->duree) && $concat->duree != 0)
                                {{ $concat->duree }}
                            @else
                                -
                            @endif
                        </td>

                        <td class="border border-gray-300 min-w-30 px-2 py-1 text-center">
                            {{ $concat->kw_charge ?? '-'  }}
                        </td>

                        <td class="border border-gray-300 min-w-30 px-2 py-1 text-center">
                            {{ $concat->prix_kwh ? $concat->prix_kwh . ' €' : '-'  }}
                        </td>

                        <td class="border border-gray-300 min-w-30 px-2 py-1 text-center">
                            {{ $concat->pu_chrg_kwh ?? '-'  }}
                        </td>

                        <td class="border border-gray-300 min-w-30 px-2 py-1 text-center">
                            {{ $concat->cout ? $concat->cout . ' €' : '-'  }}
                        </td>

                        <td class="border border-gray-300 min-w-30 px-2 py-1 text-center">
                            <strong>{{ $concat->batterie->difference() > 0 ? $concat->batterie->difference() . ' %' . ' (' . $concat->batterie->pourcentage . '%)' : '-'}}</strong>

                        </td>

                        <td class="border border-gray-300 min-w-30 px-2 py-1 text-center">
                            {{ $concat->commentaire ?: '-' }}
                        </td>
                            <td class="border border-gray-300 min-w-30 min-w-30 px-2 py-1">
                                <div class="flex justify-center gap-4">
                                    
                        @if($concat->type == 'CH')
                                    <a href="{{ route('recharges.edit', $concat->id) }}">
                        @else
                                    <a href="{{ route('trajets.edit', $concat->id) }}">
                        @endif                
                                    <svg class="svg-icon"
                                            style="width: 1em; height: 1em;vertical-align: middle;fill: currentColor;overflow: hidden;"
                                            viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M834.3 705.7c0 82.2-66.8 149-149 149H325.9c-82.2 0-149-66.8-149-149V346.4c0-82.2 66.8-149 149-149h129.8v-42.7H325.9c-105.7 0-191.7 86-191.7 191.7v359.3c0 105.7 86 191.7 191.7 191.7h359.3c105.7 0 191.7-86 191.7-191.7V575.9h-42.7v129.8z" />
                                            <path
                                                d="M889.7 163.4c-22.9-22.9-53-34.4-83.1-34.4s-60.1 11.5-83.1 34.4L312 574.9c-16.9 16.9-27.9 38.8-31.2 62.5l-19 132.8c-1.6 11.4 7.3 21.3 18.4 21.3 0.9 0 1.8-0.1 2.7-0.2l132.8-19c23.7-3.4 45.6-14.3 62.5-31.2l411.5-411.5c45.9-45.9 45.9-120.3 0-166.2zM362 585.3L710.3 237 816 342.8 467.8 691.1 362 585.3zM409.7 730l-101.1 14.4L323 643.3c1.4-9.5 4.8-18.7 9.9-26.7L436.3 720c-8 5.2-17.1 8.7-26.6 10z m449.8-430.7l-13.3 13.3-105.7-105.8 13.3-13.3c14.1-14.1 32.9-21.9 52.9-21.9s38.8 7.8 52.9 21.9c29.1 29.2 29.1 76.7-0.1 105.8z" />
                                        </svg></a>
                        @if($concat->type == 'CH')
                                    <form action="{{ route('recharges.destroy', $concat->id) }}" method="POST">
                        @else
                                    <form action="{{ route('trajets.destroy', $concat->id) }}" method="POST">
                        @endif 
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            onclick="return confirm('Voulez-vous vraiment supprimer cette concat ?')"
                                            class="text-red-600 hover:underline"><svg class="svg-icon"
                                                style="width: 1em; height: 1em;vertical-align: middle;fill: currentColor;overflow: hidden;"
                                                viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M800 384C782.08 384 768 398.08 768 416L768 832c0 35.2-28.8 64-64 64l-64 0L640 416C640 398.08 625.92 384 608 384 590.08 384 576 398.08 576 416L576 896 448 896 448 416C448 398.08 433.92 384 416 384 398.08 384 384 398.08 384 416L384 896 320 896c-35.2 0-64-28.8-64-64L256 416C256 398.08 241.92 384 224 384 206.08 384 192 398.08 192 416L192 832c0 70.4 57.6 128 128 128l384 0c70.4 0 128-57.6 128-128L832 416C832 398.08 817.92 384 800 384zM864 256l-704 0C142.08 256 128 270.08 128 288 128 305.92 142.08 320 160 320l704 0C881.92 320 896 305.92 896 288 896 270.08 881.92 256 864 256zM352 192l320 0C689.92 192 704 177.92 704 160 704 142.08 689.92 128 672 128l-320 0C334.08 128 320 142.08 320 160 320 177.92 334.08 192 352 192z" />
                                            </svg></button>
                                    </form>
                                </div>
                            </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
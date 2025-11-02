@vite(['resources/css/app.css', 'resources/js/app.js'])
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producten</title>
</head>

<body style="margin-top: 40px; background-color: #f8f9fa; font-family: Arial, sans-serif; color: #333;">
    <div style="display: flex; justify-content: center;">

        <div style="width: 90%; max-width: 900px; background: #fff; padding: 25px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">

            <h1 style="font-size: 1.8rem; margin-bottom: 10px;">{{ $title }}</h1>
            
            <hr style="margin: 20px 0; border: 1px solid #ddd;"/>

            <div style="margin-bottom: 20px;">
                @forelse ($leverancierInfo as $LCinfo)
                    <p style="margin: 5px 0;"><strong>Naam Leverancier:</strong> {{ $LCinfo->Naam }}</p>
                    <p style="margin: 5px 0;"><strong>Contactpersoon leverancier:</strong> {{ $LCinfo->Contactpersoon }}</p>
                    <p style="margin: 5px 0;"><strong>Leverancier nummer:</strong> {{ $LCinfo->Leveranciernummer }}</p>
                    <p style="margin: 5px 0;"><strong>Mobiel:</strong> {{ $LCinfo->Mobiel }}</p>
                @empty
                    <p>Geen leverancier informatie beschikbaar.</p>
                @endforelse
            </div>

            <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                <thead>
                    <tr style="background-color: #e9ecef; text-align: left;">
                        <th style="padding: 10px; border-bottom: 2px solid #dee2e6;">Naam Product</th>
                        <th style="padding: 10px; border-bottom: 2px solid #dee2e6;">Datum Laatste Levering</th>
                        <th style="padding: 10px; border-bottom: 2px solid #dee2e6;">Aantal</th>
                        <th style="padding: 10px; border-bottom: 2px solid #dee2e6;">Eerstvolgende Levering</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($leverantieInfo as $LTinfo)
                        @if($LTinfo->Aantal == 0)
                            <tr>
                                <td colspan="4" style="padding: 10px; text-align: center; color: #777;">
                                    Er is van dit product op dit moment geen voorraad aanwezig, de verwachte eerstvolgende levering is: {{ $LTinfo->DatumEerstVolgendeLevering }}
                                </td>
                                <meta http-equiv="refresh" content="4;url={{ route('home') }}">
                            </tr>
                        @else
                            <tr style="border-bottom: 1px solid #dee2e6;">
                                <td style="padding: 8px;">{{ $LTinfo->Naam }}</td>
                                <td style="padding: 8px;">{{ $LTinfo->DatumLevering }}</td>
                                <td style="padding: 8px;">{{ $LTinfo->Aantal }}</td>
                                <td style="padding: 8px;">{{ $LTinfo->DatumEerstVolgendeLevering }}</td>
                            </tr>
                        @endif
                    @empty
                        <tr>
                            <td colspan="4" style="padding: 10px; text-align: center; color: #777;">Geen producten bekend</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div style="text-align: center;">
                <a href="{{ route('home') }}" class="btn btn-Success" role="button">
                    Terug naar alle producten
                </a>
            </div>

        </div>
    </div>
</body>
</html>

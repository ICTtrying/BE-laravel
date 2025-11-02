@vite(['resources/css/app.css', 'resources/js/app.js'])
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Allergenen info</title>
</head>

<body style="margin-top: 40px; background-color: #f8f9fa; font-family: Arial, sans-serif; color: #333;">
    <div style="display: flex; justify-content: center;">

        <div style="width: 90%; max-width: 900px; background: #fff; padding: 25px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">

            <h1 style="font-size: 1.8rem; margin-bottom: 10px;">{{ $title }}</h1>
            
            <hr style="margin: 20px 0; border: 1px solid #ddd;"/>

            <div style="margin-bottom: 20px;">
                @forelse ($productenInfo as $PRODinfo)
                    <p style="margin: 5px 0;"><strong>Naam:</strong> {{ $PRODinfo->Productnaam }}</p>
                    <p style="margin: 5px 0;"><strong>Barcode:</strong> {{ $PRODinfo->ProductBarcode }}</p>
                    @break
                @empty
                    <p>Geen product informatie beschikbaar.</p>
                @endforelse
            </div>

            <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                <thead>
                    <tr style="background-color: #e9ecef; text-align: left;">
                        <th style="padding: 10px; border-bottom: 2px solid #dee2e6;">Naam</th>
                        <th style="padding: 10px; border-bottom: 2px solid #dee2e6;">Omschrijving</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($allergenenInfo as $AGinfo)
                        <tr style="border-bottom: 1px solid #dee2e6;">
                            <td style="padding: 8px;">{{ $AGinfo->Naam }}</td>
                            <td style="padding: 8px;">{{ $AGinfo->Omschrijving }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" style="padding: 10px; text-align: center; color: #777;">
                                In dit product zitten geen stoffen die een allergische reactie kunnen veroorzaken
                            </td>
                            <meta http-equiv="refresh" content="4;url={{ route('home') }}">
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <a href="{{ route('home') }}" 
               style="display: inline-block; background-color: #198754; color: #fff; padding: 10px 18px; border-radius: 5px; text-decoration: none; font-weight: 500;">
               Terug naar alle producten
            </a>
        </div>
    </div>
</body>

</html>

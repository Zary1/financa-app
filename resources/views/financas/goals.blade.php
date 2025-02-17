<div class="mt-6 space-y-4 text-center text-lg">

        <!-- Mensagem de sucesso -->
        @if(session('success'))
            <p class="text-green-600">{{ session('success') }}</p>
        @endif

        <!-- Total Geral -->
        <p>Total Geral: <span class="font-bold">{{ number_format($totalGeral ?? 0, 2, ',', '.') }} €</span></p>

        <!-- Total de Entradas -->
        <p>Total de Entradas: <span class="text-green-600 font-bold">{{ number_format($totalEntrada ?? 0, 2, ',', '.') }} €</span></p>

        <!-- Total de Saídas -->
        <p>Total de Saídas: <span class="text-red-600 font-bold">{{ number_format($totalSaida ?? 0, 2, ',', '.') }} €</span></p>
    </div>
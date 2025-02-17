

<div class="flex flex-col  w-[600px] ">
    <div class="mt-[100px] h-[300px] w-[400px] bg-white rounded-lg shadow-lg ml-5">
        <h3 class="text-xl font-semibold text-center mb-4 pt-2">Evolução do Saldo</h3>
        <canvas id="balanceChart"></canvas>
    </div>

    <!-- Seção de Metas Concluídas -->
    <div class="mt-[40px] bg-white rounded-lg shadow-lg p-4 w-[400px] ml-5">
        <h3 class="text-xl font-semibold text-center mb-4 pt-2">Metas Concluídas</h3>
        <div class="space-y-4">
        @php
        $hasCompletedGoals = false; 
    @endphp

    @foreach($goals as $goal)
        @if($goal->status == 'concluido')
            @php
                $hasCompletedGoals = true; 
            @endphp
            <div class="border-b pb-4 flex items-center space-x-2">
                <h4 class="text-lg font-semibold text-purple-500">{{ $goal->goal_name }}</h4>
                <i class="fa-solid fa-check text-green-500"></i>
            </div>
        @endif
    @endforeach

    @if (!$hasCompletedGoals)
        <p>Nenhuma meta concluída</p>
    @endif
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('balanceChart').getContext('2d');
        
        const balanceChart = new Chart(ctx, {
            type: 'line', // Tipo de gráfico (linha)
            data: {
                labels: {!! json_encode($dates) !!}, // Datas das transações
                datasets: [{
                    label: 'Saldo ao longo do tempo',
                    data: {!! json_encode($balances) !!}, // Saldo acumulado
                    borderColor: '#4B164C',
                    backgroundColor: '#DD88CF',
                    fill: true,
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: ''
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Saldo (€)'
                        },
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>

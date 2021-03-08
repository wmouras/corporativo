<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Dados da Empresa
        </h2>
    </x-slot>

    <div class="py-3">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg center">

                <div class="flex flex-row flex-wrap content-start flex-1 flex-grow pl-16">

                    <!--Dash Content -->
                    <div id="dash-content" class="flex flex-wrap content-start w-full py-6 text-center bg-gray-200 lg:py-0 lg:max-w-sm">

                        <div class="w-1/2 lg:w-full">
                            <div class="p-6 m-2 border-2 border-gray-400 border-dashed rounded hover:border-transparent hover:bg-white hover:shadow-xl md:mx-10 md:my-6">
                                <div class="flex flex-col items-center">
                                    <div class="flex-shrink">
                                        <div class="p-3 bg-green-300 rounded-full"><i class="text-indigo-500 fa fa-id-card fa-fw fa-inverse"></i></div>
                                    </div>
                                    <div class="flex-1">
                                        <h3 class="text-3xl font-bold">OK<span class="text-green-500"></span></h3>
                                        <h5 class="font-bold text-gray-500">Anuidade</h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="w-1/2 lg:w-full">
                            <div class="p-6 m-2 border-2 border-gray-400 border-dashed rounded hover:border-transparent hover:bg-white hover:shadow-xl md:mx-10 md:my-6">
                                <div class="flex flex-col items-center">
                                    <div class="flex-shrink">
                                        <div class="p-3 bg-green-300 rounded-full"><i class="text-indigo-500 fas fa-building fa-fw fa-inverse"></i></div>
                                    </div>
                                    <div class="flex-1">
                                        <h3 class="text-3xl font-bold">21 <span class="text-orange-500"><i class="fas fa-exchange-alt"></i></span></h3>
                                        <h5 class="font-bold text-gray-500">Total ARTs</h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="w-1/2 lg:w-full">
                            <div class="p-6 m-2 border-2 border-gray-400 border-dashed rounded hover:border-transparent hover:bg-white hover:shadow-xl md:mx-10 md:my-6">
                                <div class="flex flex-col items-center">
                                    <div class="flex-shrink">
                                        <div class="p-3 bg-green-300 rounded-full"><i class="text-indigo-500 fas fa-money-check-alt fa-fw fa-inverse"></i></div>
                                    </div>
                                    <div class="flex-1">
                                        <h3 class="text-3xl font-bold">0 <span class="text-yellow-600"></span></h3>
                                        <h5 class="font-bold text-gray-500">Multas</h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="w-1/2 lg:w-full">
                            <div class="p-6 m-2 border-2 border-gray-400 border-dashed rounded hover:border-transparent hover:bg-white hover:shadow-xl md:mx-10 md:my-6">
                                <div class="flex flex-col items-center">
                                    <div class="flex-shrink">
                                        <div class="p-3 bg-green-300 rounded-full"><i class="text-indigo-500 fas fa-history fa-fw fa-inverse"></i></div>
                                    </div>
                                    <div class="flex-1">
                                        <h3 class="text-3xl font-bold">8 anos</h3>
                                        <h5 class="font-bold text-gray-500">Tempo de registro</h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!--Gráfico Content -->
                    <div id="main-content" class="flex-1 w-full">

                        <div class="flex flex-wrap flex-1">

                            <div class="w-full p-6 xl:w-2/3 xl:max-w-6xl">

                                <!--"Container" for the Gráficos"-->
                                <div class="max-w-full lg:max-w-5xl xl:max-w-5xl">

                                    <!--Gráfico Card-->
                                    <div class="p-3 border-b">
                                        <h5 class="font-bold text-black">Dados Pessoais</h5>
                                    </div>
                                    <div class="w-full p-5">
                                        <ul class="w-full">
                                            <li class="w-full px-3 mb-2 text-light">{{ $pessoa->nome }}</li>
                                            <li class="px-3 mb-2 text-light w-44">{{ $pessoa->cpf }}</li>
                                            <li class="px-3 mb-2 text-light w-44">{{ Auth::user()->email }}</li>
                                        </ul>
                                        <div class="flex-shrink">
                                            <div class="w-56 p-1 bg-green-300 rounded-full">
                                                <a href="/pf/pessoafisica/dados/{{ $pessoa->fk_id_pessoa }}" class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-green-800">
                                                    <i class="fa fa-edit"></i>&nbsp;&nbsp;Editar meus dados
                                                </a>
                                            </div>
                                        </div>

                            </div>
                                    <!--/Gráfico Card-->

                                    <!--Table Card-->
                                    <div class="p-3">
                                        <div class="p-3 border-b">
                                            <h5 class="font-bold text-black">Tabela ART</h5>
                                        </div>
                                        <div class="p-5">
                                            <table class="w-full p-5 text-gray-700">
                                                <thead>
                                                    <tr>
                                                        <th class="text-left text-blue-900">Data</th>
                                                        <th class="text-left text-blue-900">Tipo</th>
                                                        <th class="text-left text-blue-900">Valor</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <tr>
                                                        <td>25/10/2020</td>
                                                        <td>Obra pequena</td>
                                                        <td>R$ 55,35</td>
                                                    </tr>
                                                    <tr>
                                                        <td>18/10/2020</td>
                                                        <td>Obra 4</td>
                                                        <td>R$ 67,21</td>
                                                    </tr>
                                                    <tr>
                                                        <td>16/10/2020</td>
                                                        <td>Obra 88</td>
                                                        <td>R$ 49,66</td>
                                                    </tr>

                                                </tbody>
                                            </table>

                                            <p class="py-2"><a href="#">Lista Completa...</a></p>

                                        </div>
                                    </div>
                                    <!--/table Card-->

                                </div>

                            </div>

                            <div class="w-full p-6 border-gray-300 xl:w-1/3 xl:max-w-4xl border-l-1">

                                <!--"Container" for the Gráficos"-->
                                <div class="max-w-sm lg:max-w-3xl xl:max-w-5xl">

                                    <!--Gráfico Card-->

                                    <div class="p-3 border-b">
                                        <h5 class="font-bold text-black">Gráfico</h5>
                                    </div>
                                    <div class="p-5">
                                        <div class="ct-chart ct-golden-section" id="chart2"></div>
                                    </div>

                                    <!--/Gráfico Card-->

                                    <!--Gráfico Card-->
                                    <div class="p-3 border-b">
                                        <h5 class="font-bold text-black">Gráfico</h5>
                                    </div>
                                    <div class="p-5">
                                        <div class="ct-chart ct-golden-section" id="chart3"></div>
                                    </div>

                                    <!--/Gráfico Card-->

                                    <!--Gráfico Card-->

                                    <div class="p-3 border-b">
                                        <h5 class="font-bold text-black">Gráfico</h5>
                                    </div>
                                    <div class="p-5">
                                        <div class="ct-chart ct-golden-section" id="chart4"></div>
                                    </div>

                                    <!--/Gráfico Card-->

                                </div>

                            </div>

                        </div>

                    </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>

    var mainChart = new Chartist.Line('#chart1', {
        labels: ['Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
        series: [
            [1, 5, 2, 5, 4, 3],
            [2, 3, 4, 8, 1, 2],
            [5, 4, 3, 2, 1, 0.5]
        ]
    }, {
        low: 0,
        showArea: true,
        showPoint: false,
        fullWidth: true
    });

    mainChart.on('draw', function(data) {
        if (data.type === 'line' || data.type === 'area') {
            data.element.animate({
                d: {
                    begin: 1000 * data.index,
                    dur: 1000,
                    from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
                    to: data.path.clone().stringify(),
                    easing: Chartist.Svg.Easing.easeOutQuint
                }
            });
        }
    });

    var chartScatter = new Chartist.Line('#chart2', {
        labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'],
        series: [
            [12, 9, 7, 8, 5, 4, 6, 2, 3, 3, 4, 6],
            [4, 5, 3, 7, 3, 5, 5, 3, 4, 4, 5, 5],
            [5, 3, 4, 5, 6, 3, 3, 4, 5, 6, 3, 4],
            [3, 4, 5, 6, 7, 6, 4, 5, 6, 7, 6, 3]
        ]
    }, {
        low: 0
    });

    chartScatter.on('draw', function(data) {
        if (data.type === 'line' || data.type === 'area') {
            data.element.animate({
                d: {
                    begin: 500 * data.index,
                    dur: 1000,
                    from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
                    to: data.path.clone().stringify(),
                    easing: Chartist.Svg.Easing.easeOutQuint
                }
            });
        }
    });

    var chartBar = new Chartist.Bar('#chart3', {
        labels: ['2018', '2019', '2020'],
        series: [
            [120, 140, 130],
            [40, 50, 30],
            [100, 40, 60]
        ]
    }, {
        stackBars: true,
        axisY: {
            labelInterpolationFnc: function(value) {
                return (value / 1000) + 'k';
            }
        }
    })

    chartBar.on('draw', function(data) {
        if (data.type === 'bar') {
            data.element.attr({
                    style: 'stroke-width: 30px'
                }),
                data.element.animate({
                    y2: {
                        dur: '0.5s',
                        from: data.y1,
                        to: data.y2
                    }
                });
        }
    });

    var chartPie = new Chartist.Pie('#chart4', {
        series: [10, 20, 50, 20, 5, 50, 15],
        labels: [1, 2, 3, 4, 5, 6, 7]
    }, {
        donut: true,
        showLabel: true
    });

    chartPie.on('draw', function(data) {
        if (data.type === 'slice') {
            var pathLength = data.element._node.getTotalLength();
            data.element.attr({
                'stroke-dasharray': pathLength + 'px ' + pathLength + 'px'
            });

            var animationDefinition = {
                'stroke-dashoffset': {
                    id: 'anim' + data.index,
                    dur: 200,
                    from: -pathLength + 'px',
                    to: '0px',
                    easing: Chartist.Svg.Easing.easeOutQuint,
                    fill: 'freeze'
                }
            };

            if (data.index !== 0) {
                animationDefinition['stroke-dashoffset'].begin = 'anim' + (data.index - 1) + '.end';
            }

            data.element.attr({
                'stroke-dashoffset': -pathLength + 'px'
            });

            data.element.animate(animationDefinition, false);
        }
    });
</script>

<script>
    /*Toggle dropdown list*/
    /*https://gist.github.com/slavapas/593e8e50cf4cc16ac972afcbad4f70c8*/

    var userMenuDiv = document.getElementById("userMenu");
    var userMenu = document.getElementById("userButton");

    document.onclick = check;

    function check(e) {
        var target = (e && e.target) || (event && event.srcElement);

        //User Menu
        if (!checkParent(target, userMenuDiv)) {
            // click NOT on the menu
            if (checkParent(target, userMenu)) {
                // click on the link
                if (userMenuDiv.classList.contains("invisible")) {
                    userMenuDiv.classList.remove("invisible");
                } else {
                    userMenuDiv.classList.add("invisible");
                }
            } else {
                // click both outside link and outside menu, hide menu
                userMenuDiv.classList.add("invisible");
            }
        }

    }

    function checkParent(t, elm) {
        while (t.parentNode) {
            if (t == elm) {
                return true;
            }
            t = t.parentNode;
        }
        return false;
    }
</script>

<x-app-layout>
    <nav class="flex mb-4" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <a href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                    <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                    </svg>
                    Home
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="w-3 h-3 text-gray-400 mx-1 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                    </svg>
                    <a href="#" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Dashboard</a>
                </div>
            </li>
        </ol>
    </nav>

    @if(session()->has('message'))
    <div class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <span class="sr-only">Info</span>
        <div>
            <span class="font-medium">{{ session('message') }}!</span>
        </div>
    </div>
    @endif

    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Dashboard</h3>

    <!-- Card Section -->

    <!-- Card Data -->
    <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 gap-4 mb-4">
        <div class="w-full">
            <div class="max-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex items-center">
                <div class="flex-1">
                    <a href="#">
                        <h6 class="mb-2 text-2xl font-semibold tracking-tight text-gray-600 dark:text-white">Total Active Voters ({{ number_format($totalActiveVoter) }})</h6>
                    </a>
                    <!-- <p class="mb-3 font-normal text-gray-500 dark:text-gray-400"></p>
                    <a href="{{ route('system-admin-dashboard-totalvoter') }}" class="inline-flex font-medium items-center text-blue-600 hover:underline">
                        Click to view details
                    </a> -->
                </div>
                <svg class="w-10 h-10 text-gray-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M8 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H6Zm7.25-2.095c.478-.86.75-1.85.75-2.905a5.973 5.973 0 0 0-.75-2.906 4 4 0 1 1 0 5.811ZM15.466 20c.34-.588.535-1.271.535-2v-1a5.978 5.978 0 0 0-1.528-4H18a4 4 0 0 1 4 4v1a2 2 0 0 1-2 2h-4.535Z" clip-rule="evenodd" />
                </svg>
            </div>
        </div>

        <div class="w-full">
            <div class="max-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex items-center">
                <div class="flex-1">
                    <a href="#">
                        <h6 class="mb-2 text-xl font-semibold tracking-tight text-gray-600 dark:text-white">Voter Faction (Municipal Level Data) ({{ number_format(0) }})</h6>
                    </a>
                    <!-- <p class="mb-3 font-normal text-gray-500 dark:text-gray-400"></p>
                    <a href="{{ route('system-admin-dashboard-voterfaction') }}" class="inline-flex font-medium items-center text-blue-600 hover:underline">
                        Click to view details
                    </a> -->
                </div>
                <svg class="w-10 h-10 text-gray-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M8 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H6Zm7.25-2.095c.478-.86.75-1.85.75-2.905a5.973 5.973 0 0 0-.75-2.906 4 4 0 1 1 0 5.811ZM15.466 20c.34-.588.535-1.271.535-2v-1a5.978 5.978 0 0 0-1.528-4H18a4 4 0 0 1 4 4v1a2 2 0 0 1-2 2h-4.535Z" clip-rule="evenodd" />
                </svg>
            </div>
        </div>

        <div class="w-full">
            <div class="max-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex items-center">
                <div class="flex-1">
                    <a href="#">
                        <h6 class="mb-2 text-2xl font-semibold tracking-tight text-gray-600 dark:text-white">Qr Scanning Monitoring ({{ 0 }})</h6>
                    </a>
                    <p class="mb-3 font-normal text-gray-500 dark:text-gray-400"></p>
                    <a href="{{ route('system-admin-dashboard-totalscan') }}" class="inline-flex font-medium items-center text-blue-600 hover:underline">
                        Click to view details
                    </a>
                </div>
                <svg class="w-10 h-10 text-gray-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M4 4h6v6H4V4Zm10 10h6v6h-6v-6Zm0-10h6v6h-6V4Zm-4 10h.01v.01H10V14Zm0 4h.01v.01H10V18Zm-3 2h.01v.01H7V20Zm0-4h.01v.01H7V16Zm-3 2h.01v.01H4V18Zm0-4h.01v.01H4V14Z" />
                    <path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M7 7h.01v.01H7V7Zm10 10h.01v.01H17V17Z" />
                </svg>

            </div>
        </div>
    </div>

    <!-- Bar Graph -->
    <div class="w-full bg-white rounded-lg shadow  mb-4 dark:bg-gray-800 p-4 md:p-6">
        <div class="flex justify-between mb-5">
            <div class="grid gap-4 grid-cols-2">
                <h3 class="text-md font-bold text-gray-600 dark:text-white mb-2">Bar Graph Showing Total Voters for Each Municipality</h3>
            </div>
        </div>
        <div id="voter-bar-graph"></div>
    </div>

    <div class="w-full bg-white rounded-lg shadow mb-4 dark:bg-gray-800 p-4 md:p-6">
        <div class="flex justify-between mb-5">
            <div class="grid gap-4">
                <h3 class="text-md font-bold text-gray-600 dark:text-white mb-2">A chart showing Ally, Opponent, and Undecided voter counts per municipality.</h3>
            </div>
            <div>
                <a href="{{ route('system-admin-map-provice') }}" class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-2.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                    View Details in Map
                </a>

                <a href="{{ route('system-admin-barangay-voter-analytics') }}" class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-2.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                    View Analytics
                </a>
            </div>
        </div>
        <div id="faction-bar-graph"></div>
    </div>

    <div class="w-full bg-white rounded-lg shadow mb-4 dark:bg-gray-800 p-4 md:p-6">
        <div class="flex justify-between mb-5">
            <div class="grid gap-4 grid-cols-2">
                <h3 class="text-md font-bold text-gray-600 dark:text-white mb-2">A marker graph showing actual vs. expected QR code scans.</h3>
            </div>
        </div>
        <div id="scan-bar-graph" data-chart="{{ json_encode($chartData) }}"></div>
    </div>

</x-app-layout>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    const options = {
        colors: ['#4052d6'], // Use generated random colors for each bar
        series: [{
            name: "Active Voter",
            data: <?php echo json_encode($votercounts_datasets) ?>,
        }],
        labels: <?php echo json_encode($municipalities_datasets) ?>,
        chart: {
            type: "bar",
            height: "300px",
            fontFamily: "Inter, sans-serif",
            toolbar: {
                show: false,
            },
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: "70%",
                borderRadiusApplication: "end",
                borderRadius: 8,
            },
        },
        tooltip: {
            shared: true,
            intersect: false,
            style: {
                fontFamily: "Inter, sans-serif",
            },
        },
        states: {
            hover: {
                filter: {
                    type: "darken",
                    value: 1,
                },
            },
        },
        stroke: {
            show: true,
            width: 0,
            colors: ["transparent"],
        },
        grid: {
            show: true,
            strokeDashArray: 4,
            padding: {
                left: 2,
                right: 2,
                top: -14
            },
        },
        dataLabels: {
            enabled: false,
        },
        legend: {
            show: false,
        },
        xaxis: {
            categories: <?php echo json_encode($municipalities_datasets) ?>,
            floating: false,
            labels: {
                show: true,
                style: {
                    fontFamily: "Inter, sans-serif",
                    cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                }
            },
            axisBorder: {
                show: false,
            },
            axisTicks: {
                show: false,
            },
        },
        yaxis: {
            show: true, // Optionally show the y-axis
        },
        fill: {
            opacity: 1,
        },
    };

    if (document.getElementById("voter-bar-graph") && typeof ApexCharts !== 'undefined') {
        const chart = new ApexCharts(document.getElementById("voter-bar-graph"), options);
        chart.render();
    }






    // Faction
    var options2 = {
        series: [{
            name: 'Ally',
            data: @json($ally_counts_datasets) // Ally counts from the controller
        }, {
            name: 'Opponent',
            data: @json($opponent_counts_datasets) // Opponent counts from the controller
        }, {
            name: 'Undecided',
            data: @json($undecided_counts_datasets) // Undecided counts from the controller
        }],
        chart: {
            type: 'bar',
            height: 300
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '55%',
                borderRadius: 5,
                borderRadiusApplication: 'end'
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
        xaxis: {
            categories: @json($municipalities_datasets2), // Municipality names from the controller
        },
        yaxis: {
            title: {
                text: 'Voter Count'
            }
        },
        fill: {
            opacity: 1
        },
        tooltip: {
            y: {
                formatter: function(val) {
                    return val + " people"
                }
            }
        },
        colors: ['#28a745', '#dc3545', '#ffc107'] // Colors for Ally, Opponent, Undecided
    };

    var chart = new ApexCharts(document.querySelector("#faction-bar-graph"), options2);
    chart.render();




    // Scan
    var chartData = JSON.parse(document.getElementById('scan-bar-graph').getAttribute('data-chart'));

    var options3 = {
        series: [{
            name: 'Actual',
            data: chartData,
        }],
        chart: {
            height: 350,
            type: 'bar'
        },
        plotOptions: {
            bar: {
                horizontal: true,
            }
        },
        colors: ['#4052d6'],
        dataLabels: {
            formatter: function(val, opt) {
                const goals =
                    opt.w.config.series[opt.seriesIndex].data[opt.dataPointIndex]
                    .goals

                if (goals && goals.length) {
                    return `${val} / ${goals[0].value}`
                }
                return val
            }
        },
        legend: {
            show: true,
            showForSingleSeries: true,
            customLegendItems: ['Actual', 'Expected'],
            markers: {
                fillColors: ['#4052d6', '#775DD0']
            }
        }
    };

    var chart3 = new ApexCharts(document.querySelector("#scan-bar-graph"), options3);
    chart3.render();
</script>
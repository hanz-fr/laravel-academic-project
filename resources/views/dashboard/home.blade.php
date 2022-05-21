@extends('layouts.main')

@section('content')


<!-- SVG Styling -->
<style>
    svg
    {
        width: 100px;
        height: 100px;
        margin: 20px;
        display:inline-block;
    }
</style>


<!-- Homepage Main Layout --> 
<div class="flex flex-col overflow-x-auto">


<!-- Container 1 -->
<div class="flex flex-col px-8 py-10 bg-white mx-5 my-5 md:mx-10 md:my-10 rounded-md drop-shadow-md border-b-8 border-teal-400">


    <!-- Welcome Title -->
    <div class="flex flex-col ml-5 md:ml-16 mb-10 mt-5">


        <!-- Welcome title jika sudah login -->
        @if(auth()->check())
            <h1 class="text-black font-black text-2xl z-10">
                    Hello, {{ auth()->user()->nama }}. 
            </h1>
            <h1 class="font-thin text-lg">
                What would you like to do today? 
            </h1>


        <!-- Welcome title jika belum login -->
        @else
            <h1 class="text-black font-black text-2xl z-10">
                Welcome to iStudent. 
            </h1>
            <h1 class="font-thin text-lg">
                Please login to access more on this website. 
            </h1>
        @endif    
        
        
    </div>

    <!-- Component Group 1 -->
    <div class="flex flex-col overflow-x-auto md:flex-row p-5 ml-0 md:ml-10 gap-5 md:mr-10 mb-5">

        {{-- TEACHERS --}}
        <div class="bg-white border-2 border-gray-100 rounded-md shadow-lg h-min w-auto md:w-96 p-10 transition ease-in relative hover:-translate-y-1 hover:drop-shadow-xl">
            <form action="/teachers/create" method="GET">
                <button type="submit" class="absolute justify-end top-4 right-4 text-[11px] md:text-[10px] ml-5 bg-teal-400 rounded p-2 font-bold pr-3 text-white transition hover:shadow-md hover:bg-teal-500"><i class="fa fa-plus mx-1 leading-none md:text-xs lg:text-xs text-white"></i>Add More</button>
            </form>
            <i class="fad fa-user mt-10 leading-none text-3xl md:text-2xl lg:text-5xl text-red-500"></i>
            <div  class="font-bold text-3xl sm:text-2xl lg:text-3xl mt-10">{{ $teachers->count() }}</div>
            <a href="/teachers" class="transition ease-in delay-250 hover:text-teal-400 hover:font-semibold text-md md:text-md lg:text-lg">Teachers</a>
            @if($teachers->isNotEmpty())
            <div class="text-xs sm:text-[10px] md:text-[10px] lg:text-xs text-gray-400">{{ $teachers->last()->updated_at->diffForHumans() }}</div> 
            @elseif($teachers->isEmpty())
            <div class="text-xs sm:text-[10px] md:text-[10px] lg:text-xs text-gray-400">-</div> 
            @endif  
        </div>
    
        {{-- STUDENTS --}}
        <div class="bg-white border-2 border-gray-100 rounded-md shadow-lg h-min w-auto md:w-96 p-10 transition ease-in relative hover:-translate-y-1 hover:drop-shadow-xl">
            <form action="/students/create" method="GET">
                <button type="submit" class="absolute justify-end top-4 right-4 text-[11px] md:text-[10px] ml-5 bg-teal-400 rounded p-2 font-bold pr-3 text-white transition hover:shadow-md hover:bg-teal-500"><i class="fa fa-plus mx-1 leading-none md:text-xs lg:text-xs text-white"></i>Add More</button>
            </form>
            <i class="fad fa-user mt-10 leading-none text-3xl md:text-2xl lg:text-5xl text-sky-400"></i>
            <div  class="font-bold text-3xl sm:text-2xl lg:text-3xl mt-10">{{ $students->count() }}</div>    
            <a href="/students" class="transition ease-in delay-250 hover:text-teal-400 hover:font-semibold text-md md:text-md lg:text-lg">Students</a>
            @if($students->isEmpty())
            <div class="text-xs sm:text-[10px] md:text-[10px] lg:text-xs text-gray-400">-</div> 
            @elseif($students->isNotEmpty())
            <div class="text-xs sm:text-[10px] md:text-[10px] lg:text-xs text-gray-400">{{ $students->last()->updated_at->diffForHumans() }}</div> 
            @endif 
        </div>
    
        {{-- SUBJECTS --}}
        <div class="bg-white border-2 border-gray-100 rounded-md shadow-lg h-min w-auto md:w-96 p-10 transition ease-in relative hover:-translate-y-1 hover:drop-shadow-xl">
            <form action="/subjects/create" method="GET">
                <button type="submit" class="absolute justify-end top-4 right-4 text-[11px] md:text-[10px] ml-5 bg-teal-400 rounded p-2 font-bold pr-3 text-white transition hover:shadow-md hover:bg-teal-500"><i class="fa fa-plus mx-1 leading-none md:text-xs lg:text-xs text-white"></i>Add More</button>
            </form>
            <i class="fad fa-book mt-10 leading-none text-3xl md:text-2xl lg:text-5xl text-yellow-400"></i>
            <div  class="font-bold text-3xl sm:text-2xl lg:text-3xl mt-10">{{ $subjects->count() }}</div>
            <a href="/subjects" class="transition ease-in delay-250 hover:text-teal-400 hover:font-semibold text-md md:text-md lg:text-lg">Subjects</a>
            @if($subjects->isEmpty())
            <div class="text-xs sm:text-[10px] md:text-[10px] lg:text-xs text-gray-400">-</div> 
            @elseif($subjects->isNotEmpty())
            <div class="text-xs sm:text-[10px] md:text-[10px] lg:text-xs text-gray-400">{{ $subjects->last()->updated_at->diffForHumans() }}</div> 
            @endif  
        </div>
    
        {{-- CLASS --}}
        <div class="bg-white border-2 border-gray-100 rounded-md shadow-lg h-min w-auto md:w-96 p-10 transition ease-in relative hover:-translate-y-1 hover:drop-shadow-xl">
            <form action="/classes/create" method="GET">
                <button type="submit" class="absolute justify-end top-4 right-4 text-[11px] md:text-[10px] ml-5 bg-teal-400 rounded p-2 font-bold pr-3 text-white transition hover:shadow-md hover:bg-teal-500"><i class="fa fa-plus mx-1 leading-none md:text-xs lg:text-xs text-white"></i>Add More</button>
            </form>
            <i class="fad fa-users mt-10 leading-none text-3xl md:text-2xl lg:text-5xl text-slate-500"></i>
            <div  class="font-bold text-3xl sm:text-2xl lg:text-3xl mt-10">{{ $class->count() }}</div>
            <a href="/classes" class="transition ease-in delay-250 hover:text-teal-400 hover:font-semibold text-md md:text-md lg:text-lg">Class</a>
            @if($class->isEmpty())
            <div class="text-xs sm:text-[10px] md:text-[10px] lg:text-xs text-gray-400">-</div> 
            @elseif($class->isNotEmpty())
            <div class="text-xs sm:text-[10px] md:text-[10px] lg:text-xs text-gray-400">{{ $class->last()->updated_at->diffForHumans() }}</div> 
            @endif  
        </div>
    
        {{-- REPORTS --}}
        <div class="bg-white border-2 border-gray-100 rounded-md shadow-lg h-min w-auto md:w-96 p-10 transition ease-in relative hover:-translate-y-1 hover:drop-shadow-xl">
            <form action="/reports/create" method="GET">
                <button type="submit" class="absolute justify-end top-4 right-4 text-[11px] md:text-[10px] ml-5 bg-teal-400 rounded p-2 font-bold pr-3 text-white transition hover:shadow-md hover:bg-teal-500"><i class="fa fa-plus mx-1 leading-none md:text-xs lg:text-xs text-white"></i>Add More</button>
            </form>
            <i class="fad fa-address-book mt-10 leading-none text-3xl md:text-2xl lg:text-5xl text-sky-500"></i>
            <div  class="font-bold text-3xl sm:text-2xl lg:text-3xl mt-10">{{ $reports->count() }}</div>
            <a href="/reports" class="transition ease-in delay-250 hover:text-teal-400 hover:font-semibold text-md md:text-md lg:text-lg">Reports</a>
            @if($reports->isEmpty())
            <div class="text-xs sm:text-[10px] md:text-[10px] lg:text-xs text-gray-400">-</div> 
            @elseif($reports->isNotEmpty())
            <div class="text-xs sm:text-[10px] md:text-[10px] lg:text-xs text-gray-400">{{ $reports->last()->updated_at->diffForHumans() }}</div> 
            @endif 
        </div>

    </div>
    <!--  End Component Group 1 -->

</div> 
<!--  End Container 1 -->



<!-- Container 2 (Chart) -->
<div class="flex flex-col px-8 py-10 bg-white mx-5 my-5 md:mx-10 md:my-5 rounded-md drop-shadow-md">
    <div class="rounded-lg overflow-hidden">
        <div class="py-3 px-5 bg-gray-100 font-bold">Data Stats</div>
        <canvas class="px-2 py-3 md:py-5 md:px-5" id="chartLine"></canvas>
    </div>
      
      <!-- Required chart.js -->
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      
      <!-- Chart line -->
      <script>
        
        // Jumlah data yang dibuat hari ini
        var scount = {!! json_encode($studcount, JSON_HEX_TAG) !!};
        var tcount = {!! json_encode($tcount, JSON_HEX_TAG) !!};
        var rcount = {!! json_encode($rcount, JSON_HEX_TAG) !!};
        var subcount = {!! json_encode($subcount, JSON_HEX_TAG) !!};
        var ccount = {!! json_encode($ccount, JSON_HEX_TAG) !!};

        // Jumlah semua data
        var scount2 = {!! json_encode($students->count(), JSON_HEX_TAG) !!};
        var tcount2 = {!! json_encode($teachers->count(), JSON_HEX_TAG) !!};
        var subcount2 = {!! json_encode($subjects->count(), JSON_HEX_TAG) !!};
        var rcount2 = {!! json_encode($reports->count(), JSON_HEX_TAG) !!};
        var ccount2 = {!! json_encode($class->count(), JSON_HEX_TAG) !!};

        const labels = ["Students", "Teachers", "Reports", "Subjects", "Class"];
        const data = {
          labels: labels,

          // Jumlah data yang dibuat pada hari ini
          scount: scount,
          tcount: tcount,
          rcount: rcount,
          subcount: subcount,
          ccount: ccount,

          // Jumlah semua data yang dibuat
          scount2: scount2,
          tcount2: tcount2,
          rcount2: rcount2,
          subcount2: subcount2,
          ccount2: ccount2,

          datasets: [
            {
              label: "Data Created Today",
              backgroundColor: "hsl(158, 100%, 44%)",
              borderColor: "hsl(158, 100%, 44%)",
              data: [scount, tcount, rcount, subcount, ccount],
              yAxisID: 'y',
            },
            {
              label: "All Data",
              backgroundColor: "hsl(198, 100%, 50%)",
              borderColor: "hsl(198, 100%, 50%)",
              data: [scount2, tcount2, rcount2, subcount2, ccount2],
              yAxisID: 'y1',
            },
          ],
        };
      
        const configLineChart = {
          type: "line",
          data,
          options: {
            responsive: true,
            interaction: {
                mode: 'index',
                intersect: false,
            },
            plugins: {
                legend: {
                    labels: {
                        font: {
                            size: 14,
                            family: "Helvetica",
                        },
                    },
                },
                decimation: {
                    enabled: true
                }
            },
            scales: {
                y: {
                    type: 'linear',
                    display: true,
                    position: 'left',
                },
                y1: {
                    type: 'linear',
                    display: true,
                    position: 'right',

                // grid line settings
                    grid: {
                        drawOnChartArea: false, // only want the grid lines for one axis to show up
                    },
                },
            },
          },
        };
      
        var chartLine = new Chart(
          document.getElementById("chartLine"),
          configLineChart
        );
      </script>
</div>
<!-- End Container 2 (Chart) -->

</div>
<!-- End Homepage Main Layout -->



@endsection
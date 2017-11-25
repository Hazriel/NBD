 @extends('layouts.app')

 @section('content')
     <div class="row">
         <div class="col-lg-12">
             <div class="nbd-section">
                 <div class="nbd-section-header">
                     <h1>@yield('title')</h1>
                 </div>
                 <div class="nbd-section-body">
                     @yield('message')
                 </div>
             </div>
         </div>
     </div>
 @endsection

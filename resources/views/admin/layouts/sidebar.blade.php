 <div class="deznav">
     <div class="deznav-scroll">
         <ul class="metismenu" id="menu">
             @if(Auth::guard('admin')->check())
             <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                     <i class="flaticon-381-networking"></i>
                     <span class="nav-text">Dashboard</span>
                 </a>
                 <ul aria-expanded="false">
                     <li><a href="{{url('/admin')}}">Dashboard</a></li>
                     <li><a href="{{url('/admin/patients')}}">Patient</a></li>
                     <li><a href="{{url('/admin/care-takers')}}">Care Taker </a></li>
                 </ul>
             </li>
             <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                     <i class="flaticon-381-networking"></i>
                     <span class="nav-text">Report</span>
                 </a>
                 <ul aria-expanded="false">
                     <li><a href="{{url('/admin/patient-report')}}">Patient Report</a></li>
                     <li><a href="{{url('/admin/care-taker-request')}}">Care taker request</a></li>
                 </ul>
             </li>
             <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                     <i class="flaticon-381-networking"></i>
                     <span class="nav-text">Product</span>
                 </a>
                 <ul aria-expanded="false">
                     <li><a href="{{url('/admin/products')}}">Products</a></li>
                     <li><a href="{{url('/admin/order')}}">Orders</a></li>
                 </ul>
             </li>
             @endif
             @if(Auth::guard('cakerTaker')->check())
             <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                     <i class="flaticon-381-networking"></i>
                     <span class="nav-text">Report</span>
                 </a>
                 <ul aria-expanded="false">
                     <li><a href="{{url('/employee/patient-report')}}">Patient Report</a></li>
                 </ul>
             </li>
             @endif

         </ul>
         @if(@$user['type'] == '1')
         <div class="plus-box">
             <p>Create new appointment</p>
         </div>
         @endif
         <div class="copyright">
             <!-- <p><strong>Mediqu Hospital Admin Dashboard</strong> © 2020 All Rights Reserved</p> -->
             <!-- <p>Made with <i class="fa fa-heart"></i> by DexignZone</p> -->
         </div>
     </div>
 </div>
 <div class="deznav">
     <div class="deznav-scroll">
         <ul class="metismenu" id="menu">
             @if(Auth::guard('admin')->check())
             <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                     <i class="flaticon-381-networking"></i>
                     <span class="nav-text">Dashboard</span>
                 </a>
                 <ul aria-expanded="false">
                     <li><a href="{{url('/admin/home')}}">Home</a></li>
                     <li><a href="{{url('/admin/patients')}}">Users</a></li>
                     <li><a href="{{url('/admin/care-takers')}}">Employees </a></li>
                 </ul>
             </li>
             <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                     <i class="flaticon-381-networking"></i>
                     <span class="nav-text">Report</span>
                 </a>
                 <ul aria-expanded="false">
                     <li><a href="{{url('/admin/patient-report')}}">Daily Reports</a></li>
                     <li><a href="{{url('/admin/care-taker-request')}}">Caretaker Requests</a></li>
                     <li><a href="{{url('/admin/product-request')}}">Products Requests</a></li>
                 </ul>
             </li>
             <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                     <i class="flaticon-381-networking"></i>
                     <span class="nav-text">Product</span>
                 </a>
                 <ul aria-expanded="false">
                     <li><a href="{{url('/admin/products')}}">Products</a></li>
                     <li><a href="{{url('/admin/order')}}">Order History</a></li>
                 </ul>
             </li>
             @endif
             @if(Auth::guard('cakerTaker')->check())
             <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                     <i class="flaticon-381-networking"></i>
                     <span class="nav-text">Report</span>
                 </a>
                 <ul aria-expanded="false">
                    @if(Auth::guard('cakerTaker')->user()->type == '1')
                     <li><a href="{{url('/employee/assigned-user')}}">Users</a></li>
                     @else
                     <li><a href="{{url('/employee/assigned-user')}}">Assigned User</a></li>
                     @endif
                     <li><a href="{{url('/employee/patient-report')}}">Daily Reports</a></li>
                 </ul>
             </li>
             @endif

         </ul>
         @if(@$user['type'] == '1')
       <!--   <div class="plus-box">
             <p>Create new appointment</p>
         </div> -->
         @endif
         <div class="copyright">
             <!-- <p><strong>Mediqu Hospital Admin Dashboard</strong> © 2020 All Rights Reserved</p> -->
             <!-- <p>Made with <i class="fa fa-heart"></i> by DexignZone</p> -->
         </div>
     </div>
 </div>
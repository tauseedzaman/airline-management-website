<div>
    <x-slot name="title">My Profile</x-slot>
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="mt-2 text-white">
            My Profile
        </h1>
        <div class="pages d-flex justify-content-center align-items-center">
            <span class="mr-2">Home</span> <span>/</span>
            <span class="mx-2"> Dashboard </span>/
            <span class="ml-2"> My Profile</span>
        </div>
    </div>

    <div class="my_card">
     <div class="table-responsive">
        <h3>Profile Information</h3>
         <table class="table my_table mt-4">
             <tr>
                 <td class="w-25">First Name</td>
                 <td>:</td>
                 <td>{{Auth::user()->fname}}</td>
             </tr>
             <tr>
                <td class="w-25">Last Name</td>
                <td>:</td>
                <td>{{Auth::user()->lname}}</td>
            </tr>
            <tr>
                <td class="w-25">Email</td>
                <td>:</td>
                <td>{{Auth::user()->email}}</td>
            </tr>
            <tr>
                <td class="w-25">Phone</td>
                <td>:</td>
                <td>{{Auth::user()->phone}}</td>
            </tr>
            <tr>
                <td class="w-25">Date of Birth</td>
                <td>:</td>
                <td>03 Jun 1990</td>
            </tr>
            <tr>
                <td class="w-25">Address</td>
                <td>:</td>
                <td>{{Auth::user()->address}}</td>
            </tr>
         </table>
     </div>
        
    </div>
</div>

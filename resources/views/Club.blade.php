@extends('Template')

@section('Main')
    <!-- Top content / Advanced search -->
    <header class="masthead2" style="background-image: url('https://s2.best-wallpaper.net/wallpaper/3840x1200/1609/Sunny-day-summer-tennis-stadium-ground_3840x1200.jpg');" >
        <div class="overlay"></div>
        <div class="container h-100">
            <div class="d-flex h-100 text-center align-items-center">
                <div class="w-100 text-white text-left">
                    <h3 class="font-weight-normal"> {{ $center->nombre }} </h3>
                    <h5 class="font-weight-normal"> {{ $center->direccion }} </h5>
                </div>

            </div>
        </div>
    </header>
    

    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <!-- Post Content Column -->
            <div class="col-lg-8">
                
                
                <hr>
                <!-- Preview Image -->
                <img class="img-fluid rounded" src="{{ asset('public/img/'.$center->imagen_perfil) }}" alt="{{$center->imagen_perfil}}">
                <hr>

                <!-- Post Content -->
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero, obcaecati, aut, error quam sapiente nemo saepe quibusdam sit excepturi nam quia corporis eligendi eos magni recusandae laborum minus inventore?</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, tenetur natus doloremque laborum quos iste ipsum rerum obcaecati impedit odit illo dolorum ab tempora nihil dicta earum fugiat. Temporibus, voluptatibus.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, doloribus, dolorem iusto blanditiis unde eius illum consequuntur neque dicta incidunt ullam ea hic porro optio ratione repellat perspiciatis. Enim, iure!</p>
                <blockquote class="blockquote">
                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                <footer class="blockquote-footer">Someone famous in
                    <cite title="Source Title">Source Title</cite>
                </footer>
                </blockquote>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, nostrum, aliquid, animi, ut quas placeat totam sunt tempora commodi nihil ullam alias modi dicta saepe minima ab quo voluptatem obcaecati?</p>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, dolor quis. Sunt, ut, explicabo, aliquam tenetur ratione tempore quidem voluptates cupiditate voluptas illo saepe quaerat numquam recusandae? Qui, necessitatibus, est!</p>

                <hr>


            </div>

            <!-- Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Search Widget -->
                <div class="card my-4">
                    <h5 class="card-header bg-dark text-white"> Deportes  </h5>
                    <div class="card-body">
                    
                        <div class="input-group">
                            <i class='pl-2 fas fa-baseball-ball' style='font-size:24px'> </i>
                            <p class="pl-5" > Tennis </p>
                        </div>

                        <div class="input-group">
                            <i class='pl-2 fas fa-basketball-ball' style='font-size:24px'> </i>
                            <p class="pl-5" > basketball </p>
                        </div>

                        <div class="input-group">
                            <i class='pl-2 fas fa-futbol' style='font-size:24px'> </i>
                            <p class="pl-5" > Football </p>
                        </div>

                        <div class="input-group">
                            <i class='pl-2 fas fa-table-tennis' style='font-size:24px'> </i>
                            <p class="pl-5" > Padel </p>
                        </div>


                    </div>
                </div>

                <!-- Categories Widget -->
                <div class="card my-4">
                    <h5 class="card-header bg-dark text-white"> Servicios </h5>
                    <div class="card-body">

                        <div class="input-group">
                            <i class='pl-2 fas fas fa-utensils' style='font-size:24px'> </i>
                            <p class="pl-5" > Restaurante </p>
                        </div>

                        <div class="input-group">
                            <i class='pl-2 fas fas fa-utensils' style='font-size:24px'> </i>
                            <p class="pl-5" > Restaurante </p>
                        </div>

                        <div class="input-group">
                            <i class='pl-2 fas fa-utensils' style='font-size:24px'> </i>
                            <p class="pl-5" > Restaurante </p>
                        </div>

                        <div class="input-group">
                            <i class='pl-2 fas fa-utensils' style='font-size:24px'> </i>
                            <p class="pl-5" > Restaurante </p>
                        </div>


                    </div>
                </div>

                <!-- Side Widget -->
                <div class="card my-4">
                    <h5 class="card-header bg-dark text-white"> Horarios </h5>
                    <div class="card-body">

                        <div class="input-group">
                            <p class="pl-2" > Lunes </p>
                            <p class="pl-5" > 08:00 - 22:00 </p>
                        </div>

                    </div>
                </div>

            </div>

        </div>
        <!-- /.row -->

        <!-- Project One -->

        
        <div class="w-100 p-3" style="background-color: #eee;">
            <h3> Tabla de reservas </h3>
            <table id="dtHorizontalExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                        <th>Extn.</th>
                        <th>E-mail</th>
                        
                        
                        
                        <th>E-mail</th>
                        
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>Tiger</td>
                        <td>Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>2011/04/25</td>
                        <td>$320,800</td>
                        <td>5421</td>
                        <td>t.nixon@datatables.net</td>
                        </tr>
                        <tr>
                        <td>Garrett</td>
                        <td>Winters</td>
                        <td>Accountant</td>
                        <td>Tokyo</td>
                        <td>63</td>
                        <td>2011/07/25</td>
                        <td>$170,750</td>
                        <td>8422</td>
                        <td>g.winters@datatables.net</td>
                        </tr>
                        <tr>
                        <td>Ashton</td>
                        <td>Cox</td>
                        <td>Junior Technical Author</td>
                        <td>San Francisco</td>
                        <td>66</td>
                        <td>2009/01/12</td>
                        <td>$86,000</td>
                        <td>1562</td>
                        <td>a.cox@datatables.net</td>
                        </tr>
                        <tr>
                        <td>Cedric</td>
                        <td>Kelly</td>
                        <td>Senior Javascript Developer</td>
                        <td>Edinburgh</td>
                        <td>22</td>
                        <td>2012/03/29</td>
                        <td>$433,060</td>
                        <td>6224</td>
                        <td>c.kelly@datatables.net</td>
                    </tr>
                </tbody>

            </table>

           
        
            
        </div>

        
    

    </div>
    <!-- /.container -->

@endsection
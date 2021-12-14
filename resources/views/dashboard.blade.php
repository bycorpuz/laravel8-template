@extends('layouts.home')

@push('styles')
    <style>
        .hello{
            font-weight: bold;
            font-size: 30pt;
        }
        .username{
            font-weight: bold;
            font-size: 40pt;
            margin-top: -2mm;
        }
        .username2{
            font-weight: bold;
            font-size: 30pt;
            margin-top: -2mm;
        }
        .dtr{
            font-size: 15pt;
        }
        .get_started{
            margin-top: 5mm;
        }

        .inquiries{
            font-size: 15pt;
            font-weight: bold;
        }
        .contact{
            font-size: 10pt;
            font-weight: bold;
        }
        .mobile_numbers{
            font-size: 12pt;
            font-weight: bold;
            text-decoration: underline;
        }
        .concerns{
            font-size: 10pt;
            font-weight: bold;
        }
    </style>
@endpush

@section('content')
    <section id="widget-grid">
        <div class="row">
            <article class="col-sm-12">
                <div class="alert alert-info fade in">
                    <button class="close" data-dismiss="alert">
                        ×
                    </button>
                    <i class="fa-fw fa fa-comment"></i>
                    Good day, please <strong><u><i>wear face mask</i></u></strong>, <strong><u><i>observe social distancing</i></u></strong>, and <strong><u><i>always wash your hands properly</i></u></strong>. Stay Safe! <strong><i>~HRMS family</i></strong>
                </div>
            </article>
        </div>

        <div class="row {{ $hideChangePasswordAlert }}">
            <article class="col-sm-12">
                <div class="alert alert-danger fade in">
                    <button class="close" data-dismiss="alert">
                        ×
                    </button>
                    <i class="fa-fw fa fa-comment"></i>
                    Good day, please <strong><u><i><a style="color: white;" href="{{ route('my-profile.index') }}" >change your password</a></i></u></strong>, para dile ma access sa uban nato kaubanan sa DepEd Cabadbaran City Division imong portal account. Salamat! <strong><u><i><a style="color: white;" href="https://www.facebook.com/bobby.y.corpuz" target="_blank">~bobszkietotx</a></i></u></strong>
                </div>
            </article>
        </div>

        <div class="row {{ $hideBirthDayAlert }}">
            <article class="col-sm-12">
                <div class="alert alert-success fade in">
                    <button class="close" data-dismiss="alert">
                        ×
                    </button>
                    <i class="fa-fw fa fa-comment"></i>
                    <strong>Happy Birthday, DepEd Cabadbaran City is wishing you a Happy Birthday. Stay Safe!</strong>
                </div>
            </article>
        </div>

        <div class="row">    
            <article class="col-sm-12 col-md-12 col-lg-3">
                <div class="well text-center">
                    <div class="hello">Hello, </div>
                    @if (strlen($userName) <= 6)
                        <div class="username">{{ $userName }}!</div>
                    @else
                        <div class="username2">{{ $userName }}!</div>
                    @endif
                    <div class="dtr">Looking for DTR?</div>
                    <div><a href="{{ route('my-dtr.index') }}" title="My DTR" class="btn btn-primary btn-lg get_started">GET STARTED</a></div>
                </div>

                <div class="well text-center">
                    <div class="inquiries">Any concerns about the portal? </div>
                    
                    <br>
                    <div class="contact">Please contact any of the following mobile phone numbers: </div>
                    <div class="mobile_numbers"><i>(smart) 09705440613</i> </div>
                    <div class="mobile_numbers"><i>(globe) 09566675760</i> </div>
                    <div class="concerns">and look for <strong><u><i><a style="color: blue;" href="https://www.facebook.com/bobby.y.corpuz" target="_blank">Mr. Bobby Y. Corpuz</a></i></u></strong> to address your concerns.</div>
                    <div class="contact">Thank you and stay safe!</div>

                    <br>                    
                    <div class="inquiries">PROVIDE US YOUR FEEDBACK <strong><u><i><a style="color: blue;" href="/customer-feedback" target="_blank">HERE.</a></i></u></strong> </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-body status">
                        <div class="who clearfix">
                            <h4><strong>Birthday Celebrants of the Month <i>({{ count($birthdays) }})</i> </strong></h4>
                        </div>
                        <div class="row">
                            <div class="text">
                            @foreach ($birthdays as $birthday)
                                @php
                                    $userFirstname = explode(' ', $birthday->firstname);
                                    $userName = $userFirstname[0];
                                    $birthDate = date_format(date_create($birthday->date_of_birth), 'F d');
                                    $birthdayNow = date_format(date_create($birthday->date_of_birth), 'm/d');
                                @endphp

                                @if($birthdayNow == date('m/d'))
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="well text-center connect">
                                            <img src="images/users/{{ $birthday->image }}" style="width: 70px; height: 70px;" alt="img" class="margin-bottom-5 margin-top-5">
                                            <br>
                                            <span class="font-xs"><h4><b>Happy Birthday, {{ $userName }}!</b></h4></span>
                                            <span class="label bg-color-red txt-color-white" style="font-size: 8pt;">{{ $birthDate }}</span>
                                        </div>
                                    </div>
                                @endif
                            @endforeach

                            @foreach ($birthdays as $birthday)
                                @php
                                    $userFirstname = explode(' ', $birthday->firstname);
                                    $userName = $userFirstname[0];
                                    $birthDate = date_format(date_create($birthday->date_of_birth), 'F d');
                                    $birthdayNow = date_format(date_create($birthday->date_of_birth), 'm/d');
                                @endphp

                                @if($birthdayNow != date('m/d'))
                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                        <div class="well text-center connect">
                                            <img src="images/users/{{ $birthday->image }}" style="width: 70px; height: 70px;" alt="img" class="margin-bottom-5 margin-top-5">
                                            <br>
                                            <span class="font-xs"><b>{{ $userName }}</b></span>
                                            <br>
                                            <span class="label bg-color-darken txt-color-white" style="font-size: 8pt;">{{ $birthDate }}</span>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </article>

            <article class="col-sm-12 col-md-9 col-lg-9 sortable-grid ui-sortable">
                <div class="jarviswidget jarviswidget-color-greenDark" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false" role="widget">
                    <header role="heading">
                        <span class="widget-icon"> <i class="fa fa-list-alt"></i> </span>
                        <h2>
                            <strong>
                                SUBM OF REQS AND OTHER RELEVANT 
                                DOCS ON RECLAS OF SHs, 
                                ERF, AND CONVERSION OF MT ITEMS
                            </strong>
                        </h2>
                        <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span>
                    </header>
                    <div role="content">
                        <div class="jarviswidget-editbox">
                        </div>
                        <div class="widget-body no-padding">
                            <div class="panel-group smart-accordion-default" id="accordion-2">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion-2" href="#collapseOne-1" aria-expanded="true">
                                                <i class="fa fa-fw fa-plus-circle txt-color-green"></i>
                                                <i class="fa fa-fw fa-minus-circle txt-color-red"></i>
                                                <strong>Basic Requirements in ERF ( Teacher 2 & 3 ) </strong>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne-1" class="panel-collapse collapse in" aria-expanded="true">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <ol style="font-size: 12pt;">
                                                        <li> &nbsp; <strong>Four (4) copies of duly accomplished ERF</strong> </li>
                                                        <li> &nbsp; <strong>Updated and comprehensive Service Record</strong> </li>

                                                        <li> &nbsp; <strong>Copy of the following: </strong> </li> 
                                                        <ul class="list-unstyled">
                                                            <li class="text-success">
                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                <strong><u>Transcript of Records,</u></strong>
                                                            </li>
                                                            <li class="text-success">
                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                <strong><u>Special Order, and</u></strong>
                                                            </li>
                                                            <li class="text-success">
                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                <strong><u>CAV</u> <i class="text-info">(duly certified as true copy from the original by the Record's Officer)</i></strong>
                                                            </li>
                                                        </ul>

                                                        <li> &nbsp; <strong>IPCR for the last three rating periods <i class="text-info">(at least VS)</i></strong> </li>
                                                        <li> &nbsp; <strong>Certificate of Employment <i class="text-info">(for teachers with private shool teaching experience)</i></strong> </li>
                                                        
                                                        <li> &nbsp; <strong>Original copies of the following certificates: </strong> </li>
                                                        <ul class="list-unstyled">
                                                            <li class="text-success">
                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                <strong><u>Learning and Development Activities,</u></strong>
                                                            </li>
                                                            <li class="text-success">
                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                <strong><u>Scholarship, and</u></strong>
                                                            </li>
                                                            <li class="text-success">
                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                <strong><u>Educational Travel</u></strong>
                                                            </li>
                                                        </ul>

                                                        <li> &nbsp; <strong>Updated PRC license </strong> </li>
                                                        <li> &nbsp; <strong>Copy of research worh with Certificate of Recognition </strong> </li>
                                                        <li> &nbsp; <strong>Teacher's Sworn Statement of Attending School </strong> </li>
                                                        <li> &nbsp; <strong>Copy of Thesis/Dissertation for full-fledged MA/PhD/EdD </strong> </li>
                                                    </ol>                  
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion-2" href="#collapseOne-2" aria-expanded="false" class="collapsed">
                                                <i class="fa fa-fw fa-plus-circle txt-color-green"></i>
                                                <i class="fa fa-fw fa-minus-circle txt-color-red"></i>
                                                <strong>Basic Requirements in ERF ( SPED Teacher I ) </strong>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne-2" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <ol style="font-size: 12pt;">
                                                        <li> &nbsp; <strong>Four (4) copies of duly accomplished ERF</strong> </li>
                                                        <li> &nbsp; <strong>Updated and comprehensive Service Record</strong> </li>

                                                        <li> &nbsp; <strong>Copy of the following: </strong> </li> 
                                                        <ul class="list-unstyled">
                                                            <li class="text-success">
                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                <strong><u>Transcript of Records,</u></strong>
                                                            </li>
                                                            <li class="text-success">
                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                <strong><u>Special Order, and</u></strong>
                                                            </li>
                                                            <li class="text-success">
                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                <strong><u>CAV</u> <i class="text-info">(duly certified as true copy from the original by the Record's Officer) – BSE/EEd w/specialization in SPED/has a <u>minimum 18 units in SPED</u></i></strong>
                                                            </li>
                                                        </ul>

                                                        <li> &nbsp; <strong>IPCR for the last three rating periods <i class="text-info">(at least VS)</i></strong> </li>
                                                        <li> &nbsp; <strong>Certification that the teacher has at least 3 years experience teaching children with special needs</strong> </li>

                                                        <li> &nbsp; <strong>Certificates of the one-month summer training in SPED conducted at the following: </strong> </li> 
                                                        <ul class="list-unstyled">
                                                            <li class="text-success">
                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                <strong><u>PNU,</u></strong>
                                                            </li>
                                                            <li class="text-success">
                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                <strong><u>UP,</u></strong>
                                                            </li>
                                                            <li class="text-success">
                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                <strong><u>YMCA Open College,</u> </strong>
                                                            </li>
                                                            <li class="text-success">
                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                <strong><u>Manila, or</u> </strong>
                                                            </li>
                                                            <li class="text-success">
                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                <strong><u>Other institutions through DepEd shall be given 9 units</u> </strong>
                                                            </li>
                                                        </ul>
                                                        
                                                        <li> &nbsp; <strong>Updated PRC license & LET/PBET Rating</strong> </li>
                                                    </ol>                  
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion-2" href="#collapseOne-3" aria-expanded="false" class="collapsed">
                                                <i class="fa fa-fw fa-plus-circle txt-color-green"></i>
                                                <i class="fa fa-fw fa-minus-circle txt-color-red"></i>
                                                <strong>Basic Requirements in ERF ( SPED Teacher II ) </strong>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne-3" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <ol style="font-size: 12pt;">
                                                        <li> &nbsp; <strong>Four (4) copies of duly accomplished ERF</strong> </li>
                                                        <li> &nbsp; <strong>Updated and comprehensive Service Record</strong> </li>

                                                        <li> &nbsp; <strong>Copy of the following: </strong> </li> 
                                                        <ul class="list-unstyled">
                                                            <li class="text-success">
                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                <strong><u>Transcript of Records,</u></strong>
                                                            </li>
                                                            <li class="text-success">
                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                <strong><u>Special Order, and</u></strong>
                                                            </li>
                                                            <li class="text-success">
                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                <strong><u>CAV</u> <i class="text-info">(duly certified as true copy from the original by the Record's Officer) – BSE/EEd w/specialization in SPED/has a <u>minimum 38 units in SPED</u></i></strong>
                                                            </li>
                                                        </ul>

                                                        <li> &nbsp; <strong>IPCR for the last three rating periods <i class="text-info">(at least VS)</i></strong> </li>
                                                        <li> &nbsp; <strong>Certification that the teacher has at least 3 years experience teaching children with special needs</strong> </li>

                                                        <li> &nbsp; <strong>Certificates of the one-month summer training in SPED conducted at the following: </strong> </li> 
                                                        <ul class="list-unstyled">
                                                            <li class="text-success">
                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                <strong><u>PNU,</u></strong>
                                                            </li>
                                                            <li class="text-success">
                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                <strong><u>UP,</u></strong>
                                                            </li>
                                                            <li class="text-success">
                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                <strong><u>YMCA Open College,</u> </strong>
                                                            </li>
                                                            <li class="text-success">
                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                <strong><u>Manila, or</u> </strong>
                                                            </li>
                                                            <li class="text-success">
                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                <strong><u>Other institutions through DepEd shall be given 9 units</u> </strong>
                                                            </li>
                                                        </ul>
                                                        
                                                        <li> &nbsp; <strong>Updated PRC license</strong> </li>
                                                    </ol>                  
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion-2" href="#collapseOne-4" aria-expanded="false" class="collapsed">
                                                <i class="fa fa-fw fa-plus-circle txt-color-green"></i>
                                                <i class="fa fa-fw fa-minus-circle txt-color-red"></i>
                                                <strong>Basic Requirements for School Head Positions </strong>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne-4" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                        <div class="panel-body">

                                            <div class="panel-group smart-accordion-default" id="accordion-3">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion-3" href="#collapseOne-5" aria-expanded="true">
                                                                <i class="fa fa-fw fa-plus-circle txt-color-green"></i>
                                                                <i class="fa fa-fw fa-minus-circle txt-color-red"></i>
                                                                <strong>Basic Requirements ( School Heads ) – <i>Initial Requirements</i></strong>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseOne-5" class="panel-collapse collapse in" aria-expanded="true">
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <ol style="font-size: 12pt;">
                                                                        <li> &nbsp; <strong>Four (4) copies of duly accomplished ERF</strong> </li>
                                                                        <li> &nbsp; <strong>Justification for the reclassification of the position</strong> </li>
                                                                        <li> &nbsp; <strong>Duly accomplished Form 212 (Personal Data Sheet)</strong> </li>
                                                                        <li> &nbsp; <strong>Certified, Authenticated & Verified (CAV) Transcript of Records, (TOR)</strong> </li>
                                                                        <li> &nbsp; <strong>Updated Service Record</strong> </li>
                                                                        <li> &nbsp; <strong>Performance Rating Sheet for the last 3 consecutive years</strong> </li>
                                                                        <li> &nbsp; <strong>Certificates/Proofs of Outstanding Accomplishment</strong> </li>
                                                                        <li> &nbsp; <strong>NEAP Certification as to the result of NQEP taken & Basic Training Course for School Heads attended</strong> </li>
                                                                        <li> &nbsp; <strong>SBM Task Force's Certification as to the rating obtained in the internal and external stakeholders' assessment</strong> </li>
                                                                        <li> &nbsp; <strong>Division Selection & Promotions Boards' Certification on the points obtained in the Psychological Attributes & Personality Traits assessment, and</strong> </li>
                                                                        <li> &nbsp; <strong>Enrollment Data (Form 3) in the present school assignment, including the cluster handled, if any.</strong> </li>
                                                                        <li> &nbsp; <strong>Copy of the latest post-audited PSIPOP where the names of the teachers under his/her supervision are reflected</strong> </li>
                                                                        <li> &nbsp; <strong>List of teachers under his/her supervison, with item number duly certified by the Schools Division Superintendent</strong> </li>
                                                                    </ol>                  
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion-3" href="#collapseOne-6" aria-expanded="false" class="collapsed">
                                                                <i class="fa fa-fw fa-plus-circle txt-color-green"></i>
                                                                <i class="fa fa-fw fa-minus-circle txt-color-red"></i>
                                                                <strong>Head Teacher I – <i>Additional Requirements</i></strong>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseOne-6" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <ul style="font-size: 12pt;">
                                                                        <li> &nbsp; <strong>At least 12 MA units in the fields of the following: </strong> </li>
                                                                        <ul class="list-unstyled">
                                                                            <li class="text-success">
                                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                                <strong><u>Administration,</u></strong>
                                                                            </li>
                                                                            <li class="text-success">
                                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                                <strong><u>Supervision,</u></strong>
                                                                            </li>
                                                                            <li class="text-success">
                                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                                <strong><u>Leadership, or</u></strong>
                                                                            </li>
                                                                            <li class="text-success">
                                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                                <strong><u>Management</u></strong>
                                                                            </li>
                                                                        </ul>

                                                                        <li> &nbsp; <strong>3 years teaching experience and TIC for at least 1 year with at least 6 teachers under his/her supervision </strong> </li>
                                                                        
                                                                        <li> &nbsp; <strong>24 hours of relevant training of the following: </strong> </li>
                                                                        <ul class="list-unstyled">
                                                                            <li class="text-success">
                                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                                <strong><u>Initiated,</u></strong>
                                                                            </li>
                                                                            <li class="text-success">
                                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                                <strong><u>Sactioned, or</u></strong>
                                                                            </li>
                                                                            <li class="text-success">
                                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                                <strong><u>Approved/Recognized</u></strong>
                                                                            </li>
                                                                            &nbsp; <strong>by DepEd <i class="text-info">not used in the immediate previous promotion</i></strong>
                                                                        </ul>

                                                                        <li> &nbsp; <strong>At least Very Satisfactory for the last 3 consecutive years; or Outstanding for the last 2 consecutive years</strong> </li>
                                                                    </ul>                  
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion-3" href="#collapseOne-7" aria-expanded="false" class="collapsed">
                                                                <i class="fa fa-fw fa-plus-circle txt-color-green"></i>
                                                                <i class="fa fa-fw fa-minus-circle txt-color-red"></i>
                                                                <strong>Head Teacher II – <i>Additional Requirements</i></strong>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseOne-7" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <ul style="font-size: 12pt;">
                                                                        <li> &nbsp; <strong>At least 12 MA units in the fields of the following: </strong> </li>
                                                                        <ul class="list-unstyled">
                                                                            <li class="text-success">
                                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                                <strong><u>Administration,</u></strong>
                                                                            </li>
                                                                            <li class="text-success">
                                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                                <strong><u>Supervision,</u></strong>
                                                                            </li>
                                                                            <li class="text-success">
                                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                                <strong><u>Leadership, or</u></strong>
                                                                            </li>
                                                                            <li class="text-success">
                                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                                <strong><u>Management</u></strong>
                                                                            </li>
                                                                        </ul>

                                                                        <li> &nbsp; <strong>HT for 1 year with at least 6 teachers under his/her supervision </strong> </li>
                                                                        
                                                                        <li> &nbsp; <strong>24 hours of relevant training of the following: </strong> </li>
                                                                        <ul class="list-unstyled">
                                                                            <li class="text-success">
                                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                                <strong><u>Initiated,</u></strong>
                                                                            </li>
                                                                            <li class="text-success">
                                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                                <strong><u>Sactioned, or</u></strong>
                                                                            </li>
                                                                            <li class="text-success">
                                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                                <strong><u>Approved/Recognized</u></strong>
                                                                            </li>
                                                                            &nbsp; <strong>by DepEd <i class="text-info">not used in the immediate previous promotion</i></strong>
                                                                        </ul>

                                                                        <li> &nbsp; <strong>At least Very Satisfactory for the last 3 consecutive years; or Outstanding for the last 2 consecutive years</strong> </li>
                                                                    </ul>                  
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion-3" href="#collapseOne-8" aria-expanded="false" class="collapsed">
                                                                <i class="fa fa-fw fa-plus-circle txt-color-green"></i>
                                                                <i class="fa fa-fw fa-minus-circle txt-color-red"></i>
                                                                <strong>Head Teacher III – <i>Additional Requirements</i></strong>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseOne-8" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <ul style="font-size: 12pt;">
                                                                        <li> &nbsp; <strong>At least 36 MA units in the fields of the following: </strong> </li>
                                                                        <ul class="list-unstyled">
                                                                            <li class="text-success">
                                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                                <strong><u>Administration,</u></strong>
                                                                            </li>
                                                                            <li class="text-success">
                                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                                <strong><u>Supervision,</u></strong>
                                                                            </li>
                                                                            <li class="text-success">
                                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                                <strong><u>Leadership, or</u></strong>
                                                                            </li>
                                                                            <li class="text-success">
                                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                                <strong><u>Management</u></strong>
                                                                            </li>
                                                                        </ul>

                                                                        <li> &nbsp; <strong>HT II for 2 years with at least 6 teachers under his/her supervision </strong> </li>
                                                                        
                                                                        <li> &nbsp; <strong>32 hours of relevant training of the following: </strong> </li>
                                                                        <ul class="list-unstyled">
                                                                            <li class="text-success">
                                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                                <strong><u>Initiated,</u></strong>
                                                                            </li>
                                                                            <li class="text-success">
                                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                                <strong><u>Sactioned, or</u></strong>
                                                                            </li>
                                                                            <li class="text-success">
                                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                                <strong><u>Approved/Recognized</u></strong>
                                                                            </li>
                                                                            &nbsp; <strong>by DepEd <i class="text-info">not used in the immediate previous promotion</i></strong>
                                                                        </ul>

                                                                        <li> &nbsp; <strong>At least Very Satisfactory for the last 3 consecutive years; or Outstanding for the last 2 consecutive years</strong> </li>
                                                                    </ul>                  
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion-3" href="#collapseOne-9" aria-expanded="false" class="collapsed">
                                                                <i class="fa fa-fw fa-plus-circle txt-color-green"></i>
                                                                <i class="fa fa-fw fa-minus-circle txt-color-red"></i>
                                                                <strong>Head Teacher IV – <i>Additional Requirements</i></strong>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseOne-9" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <ul style="font-size: 12pt;">
                                                                        <li> &nbsp; <strong>Completed Academic Requirements in the fields of the following: </strong> </li>
                                                                        <ul class="list-unstyled">
                                                                            <li class="text-success">
                                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                                <strong><u>Administration,</u></strong>
                                                                            </li>
                                                                            <li class="text-success">
                                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                                <strong><u>Supervision,</u></strong>
                                                                            </li>
                                                                            <li class="text-success">
                                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                                <strong><u>Leadership, or</u></strong>
                                                                            </li>
                                                                            <li class="text-success">
                                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                                <strong><u>Management</u></strong>
                                                                            </li>
                                                                        </ul>

                                                                        <li> &nbsp; <strong>HT III for 2 years </strong> </li>
                                                                        
                                                                        <li> &nbsp; <strong>32 hours of relevant training of the following: </strong> </li>
                                                                        <ul class="list-unstyled">
                                                                            <li class="text-success">
                                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                                <strong><u>Initiated,</u></strong>
                                                                            </li>
                                                                            <li class="text-success">
                                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                                <strong><u>Sactioned, or</u></strong>
                                                                            </li>
                                                                            <li class="text-success">
                                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                                <strong><u>Approved/Recognized</u></strong>
                                                                            </li>
                                                                            &nbsp; <strong>by DepEd <i class="text-info">not used in the immediate previous promotion</i></strong>
                                                                        </ul>

                                                                        <li> &nbsp; <strong>At least Very Satisfactory for the last 3 consecutive years; or Outstanding for the last 2 consecutive years</strong> </li>
                                                                    </ul>                  
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion-3" href="#collapseOne-10" aria-expanded="false" class="collapsed">
                                                                <i class="fa fa-fw fa-plus-circle txt-color-green"></i>
                                                                <i class="fa fa-fw fa-minus-circle txt-color-red"></i>
                                                                <strong>Principal I – <i>Additional Requirements</i></strong>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseOne-10" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <ul style="font-size: 12pt;">
                                                                        <li> &nbsp; <strong>Master's degree in the fields of the following: </strong> </li>
                                                                        <ul class="list-unstyled">
                                                                            <li class="text-success">
                                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                                <strong><u>Administration,</u></strong>
                                                                            </li>
                                                                            <li class="text-success">
                                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                                <strong><u>Supervision,</u></strong>
                                                                            </li>
                                                                            <li class="text-success">
                                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                                <strong><u>Leadership, or</u></strong>
                                                                            </li>
                                                                            <li class="text-success">
                                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                                <strong><u>Management</u></strong>
                                                                            </li>
                                                                        </ul>

                                                                        <li> &nbsp; <strong>2 years as HT III for elementary; 2 years as HT VI for secondary with at least 9 teachers under his/her supervision </strong> </li>
                                                                        
                                                                        <li> &nbsp; <strong>48 hours of relevant training of the following: </strong> </li>
                                                                        <ul class="list-unstyled">
                                                                            <li class="text-success">
                                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                                <strong><u>Initiated,</u></strong>
                                                                            </li>
                                                                            <li class="text-success">
                                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                                <strong><u>Sactioned, or</u></strong>
                                                                            </li>
                                                                            <li class="text-success">
                                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                                <strong><u>Approved/Recognized</u></strong>
                                                                            </li>
                                                                            &nbsp; <strong>by DepEd <i class="text-info">not used in the immediate previous promotion</i></strong>
                                                                        </ul>

                                                                        <li> &nbsp; <strong>At least Very Satisfactory for the last 3 consecutive years; or Outstanding for the last 2 consecutive years</strong> </li>
                                                                    </ul>                  
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion-3" href="#collapseOne-11" aria-expanded="false" class="collapsed">
                                                                <i class="fa fa-fw fa-plus-circle txt-color-green"></i>
                                                                <i class="fa fa-fw fa-minus-circle txt-color-red"></i>
                                                                <strong>Principal II – <i>Additional Requirements</i></strong>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseOne-11" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <ul style="font-size: 12pt;">
                                                                        <li> &nbsp; <strong>Master's degree in the fields of the following: </strong> </li>
                                                                        <ul class="list-unstyled">
                                                                            <li class="text-success">
                                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                                <strong><u>Administration,</u></strong>
                                                                            </li>
                                                                            <li class="text-success">
                                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                                <strong><u>Supervision,</u></strong>
                                                                            </li>
                                                                            <li class="text-success">
                                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                                <strong><u>Leadership, or</u></strong>
                                                                            </li>
                                                                            <li class="text-success">
                                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                                <strong><u>Management</u></strong>
                                                                            </li>
                                                                            <li class="text-success">
                                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                                <strong><u>Plus 6 doctoral units</u></strong>
                                                                            </li>
                                                                        </ul>

                                                                        <li> &nbsp; <strong>1 year as Principal I </strong> </li>
                                                                        
                                                                        <li> &nbsp; <strong>48 hours of relevant training of the following: </strong> </li>
                                                                        <ul class="list-unstyled">
                                                                            <li class="text-success">
                                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                                <strong><u>Initiated,</u></strong>
                                                                            </li>
                                                                            <li class="text-success">
                                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                                <strong><u>Sactioned, or</u></strong>
                                                                            </li>
                                                                            <li class="text-success">
                                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                                <strong><u>Approved/Recognized</u></strong>
                                                                            </li>
                                                                            &nbsp; <strong>by DepEd <i class="text-info">not used in the immediate previous promotion</i></strong>
                                                                        </ul>

                                                                        <li> &nbsp; <strong>At least Very Satisfactory for the last 3 consecutive years; or Outstanding for the last 2 consecutive years</strong> </li>
                                                                    </ul>                  
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion-3" href="#collapseOne-12" aria-expanded="false" class="collapsed">
                                                                <i class="fa fa-fw fa-plus-circle txt-color-green"></i>
                                                                <i class="fa fa-fw fa-minus-circle txt-color-red"></i>
                                                                <strong>Principal III – <i>Additional Requirements</i></strong>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseOne-12" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <ul style="font-size: 12pt;">
                                                                        <li> &nbsp; <strong>Master's degree in the fields of the following: </strong> </li>
                                                                        <ul class="list-unstyled">
                                                                            <li class="text-success">
                                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                                <strong><u>Administration,</u></strong>
                                                                            </li>
                                                                            <li class="text-success">
                                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                                <strong><u>Supervision,</u></strong>
                                                                            </li>
                                                                            <li class="text-success">
                                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                                <strong><u>Leadership, or</u></strong>
                                                                            </li>
                                                                            <li class="text-success">
                                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                                <strong><u>Management</u></strong>
                                                                            </li>
                                                                            <li class="text-success">
                                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                                <strong><u>Plus 12 doctoral units</u></strong>
                                                                            </li>
                                                                        </ul>

                                                                        <li> &nbsp; <strong>2 years as Principal II </strong> </li>
                                                                        
                                                                        <li> &nbsp; <strong>56 hours of relevant training of the following: </strong> </li>
                                                                        <ul class="list-unstyled">
                                                                            <li class="text-success">
                                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                                <strong><u>Initiated,</u></strong>
                                                                            </li>
                                                                            <li class="text-success">
                                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                                <strong><u>Sactioned, or</u></strong>
                                                                            </li>
                                                                            <li class="text-success">
                                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                                <strong><u>Approved/Recognized</u></strong>
                                                                            </li>
                                                                            &nbsp; <strong>by DepEd <i class="text-info">not used in the immediate previous promotion</i></strong>
                                                                        </ul>

                                                                        <li> &nbsp; <strong>At least Very Satisfactory for the last 3 consecutive years; or Outstanding for the last 2 consecutive years</strong> </li>
                                                                    </ul>                  
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion-3" href="#collapseOne-13" aria-expanded="false" class="collapsed">
                                                                <i class="fa fa-fw fa-plus-circle txt-color-green"></i>
                                                                <i class="fa fa-fw fa-minus-circle txt-color-red"></i>
                                                                <strong>Principal IV – <i>Additional Requirements</i></strong>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseOne-13" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <ul style="font-size: 12pt;">
                                                                        <li> &nbsp; <strong>Master's degree in the fields of the following: </strong> </li>
                                                                        <ul class="list-unstyled">
                                                                            <li class="text-success">
                                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                                <strong><u>Administration,</u></strong>
                                                                            </li>
                                                                            <li class="text-success">
                                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                                <strong><u>Supervision,</u></strong>
                                                                            </li>
                                                                            <li class="text-success">
                                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                                <strong><u>Leadership, or</u></strong>
                                                                            </li>
                                                                            <li class="text-success">
                                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                                <strong><u>Management</u></strong>
                                                                            </li>
                                                                            <li class="text-success">
                                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                                <strong><u>Plus 24 doctoral units</u></strong>
                                                                            </li>
                                                                        </ul>

                                                                        <li> &nbsp; <strong>2 years as Principal III </strong> </li>
                                                                        
                                                                        <li> &nbsp; <strong>56 hours of relevant training of the following: </strong> </li>
                                                                        <ul class="list-unstyled">
                                                                            <li class="text-success">
                                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                                <strong><u>Initiated,</u></strong>
                                                                            </li>
                                                                            <li class="text-success">
                                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                                <strong><u>Sactioned, or</u></strong>
                                                                            </li>
                                                                            <li class="text-success">
                                                                                &nbsp; <i class="fa fa-check"></i> 
                                                                                <strong><u>Approved/Recognized</u></strong>
                                                                            </li>
                                                                            &nbsp; <strong>by DepEd <i class="text-info">not used in the immediate previous promotion</i></strong>
                                                                        </ul>

                                                                        <li> &nbsp; <strong>At least Very Satisfactory for the last 3 consecutive years; or Outstanding for the last 2 consecutive years</strong> </li>
                                                                    </ul>                  
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion-2" href="#collapseOne-14" aria-expanded="false" class="collapsed">
                                                <i class="fa fa-fw fa-plus-circle txt-color-green"></i>
                                                <i class="fa fa-fw fa-minus-circle txt-color-red"></i>
                                                <strong>Basic Requirements for Master Teacher: <u>Demonstration teaching with documentation</u></strong>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne-14" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                        <div class="panel-body">

                                            <div class="panel-group smart-accordion-default" id="accordion-4">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion-4" href="#collapseOne-15" aria-expanded="false" class="collapsed">
                                                                <i class="fa fa-fw fa-plus-circle txt-color-green"></i>
                                                                <i class="fa fa-fw fa-minus-circle txt-color-red"></i>
                                                                <strong>Master Teacher I </strong>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseOne-15" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <ul style="font-size: 12pt;">
                                                                        <li> &nbsp; <strong>BS degree + 24 units </strong> </li>
                                                                        <li> &nbsp; <strong>At least 3 years of teaching experience </strong> </li>
                                                                        <li> &nbsp; <strong>VS Performance Rating for the last 2 years </strong> </li>
                                                                        <li> &nbsp; <strong>At least 25 points in leadership potentials & accomplishments </strong> </li>
                                                                    </ul>                  
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion-4" href="#collapseOne-16" aria-expanded="false" class="collapsed">
                                                                <i class="fa fa-fw fa-plus-circle txt-color-green"></i>
                                                                <i class="fa fa-fw fa-minus-circle txt-color-red"></i>
                                                                <strong>Master Teacher II </strong>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseOne-16" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <ul style="font-size: 12pt;">
                                                                        <li> &nbsp; <strong>MT I for at least 2 years </strong> </li>
                                                                        <li> &nbsp; <strong>VS Performance Rating as MT I </strong> </li>
                                                                        <li> &nbsp; <strong>BS degree + CAR in MA </strong> </li>
                                                                        <li> &nbsp; <strong>At least 30 points in leadership potentials & accomplishments </strong> </li>
                                                                    </ul>                  
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion-4" href="#collapseOne-17" aria-expanded="false" class="collapsed">
                                                                <i class="fa fa-fw fa-plus-circle txt-color-green"></i>
                                                                <i class="fa fa-fw fa-minus-circle txt-color-red"></i>
                                                                <strong>Master Teacher III </strong>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseOne-17" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <ul style="font-size: 12pt;">
                                                                        <li> &nbsp; <strong>MT II for at least 3 years </strong> </li>
                                                                        <li> &nbsp; <strong>MA in Education or equivalent </strong> </li>
                                                                        <li> &nbsp; <strong>VS Performance Rating for the last 2 years </strong> </li>
                                                                        <li> &nbsp; <strong>At least 45 points in leadership potentials & accomplishments</strong> </li>
                                                                        <li> &nbsp; <strong>MT II Demonstration teacher</strong> </li>
                                                                    </ul>                  
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion-4" href="#collapseOne-18" aria-expanded="false" class="collapsed">
                                                                <i class="fa fa-fw fa-plus-circle txt-color-green"></i>
                                                                <i class="fa fa-fw fa-minus-circle txt-color-red"></i>
                                                                <strong>Master Teacher IV </strong>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseOne-18" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <ul style="font-size: 12pt;">
                                                                        <li> &nbsp; <strong>MT III for at least 3 years </strong> </li>
                                                                        <li> &nbsp; <strong>Outstanding Performance as MT III for the last two years </strong> </li>
                                                                        <li> &nbsp; <strong>At least an MA in Education, MAT, or MEd </strong> </li>
                                                                        <li> &nbsp; <strong>At least 60 points in leadership potentials & accomplishments </strong> </li>
                                                                        <li> &nbsp; <strong>MT III Demonstration teacher </strong> </li>
                                                                    </ul>                  
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="jarviswidget jarviswidget-color-red" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false" role="widget">
                    <header role="heading">
                        <span class="widget-icon"> <i class="fa fa-list-alt"></i> </span>
                        <h2>
                            <strong>
                                OTHER REQUIREMENTS
                            </strong>
                        </h2>
                        <span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span>
                    </header>
                    <div role="content">
                        <div class="jarviswidget-editbox">
                        </div>
                        <div class="widget-body no-padding">
                            <div class="panel-group smart-accordion-default" id="accordion-2">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion-2" href="#collapseOne-2-1" aria-expanded="true">
                                                <i class="fa fa-fw fa-plus-circle txt-color-green"></i>
                                                <i class="fa fa-fw fa-minus-circle txt-color-red"></i>
                                                <strong>Requirements for Retirement</strong>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne-2-1" class="panel-collapse collapse in" aria-expanded="true">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    
                                                    <div style="font-size: 12pt; font-style: italic;">(One folder with Transmittal Letter signed by the Superintendent)</div>
                                                    <br>

                                                    <div style="font-size: 12pt; font-weight: bold;">For submission 3 months before retirement date as required by GSIS</div>
                                                    <br>

                                                    <ol style="font-size: 12pt;">
                                                        <li> &nbsp; <strong>Letter of Intent to Retire</strong> </li>
                                                        <li> &nbsp; <strong>Application for Retirement and Other Social Insurance Benefits <i>(GSIS Form)</i> <i class="text-info"> - 5 copies with 1x1 picture</i></strong> </li>

                                                        <li> &nbsp; <strong>Division Clearance <i>(for Administrators)</i> <i class="text-info"> - 4 copies</i></strong> </li>
                                                        <li> &nbsp; <strong>District/School Clearance <i>(for Teachers)</i> <i class="text-info"> - 4 copies</i></strong> </li>
                                                        <li> &nbsp; <strong>Service Record <i class="text-info"> - 3 copies</i></strong> </li>
                                                        <li> &nbsp; <strong>Certificate of Clearance from Provident Fund <i class="text-info"> - 4 copies</i></strong> </li>
                                                        <li> &nbsp; <strong>Certificate of No Pending Case <i class="text-info"> - 4 copies</i></strong> </li>
                                                        <li> &nbsp; <strong>Assets & Liabilities <i class="text-info"> - 4 copies</i></strong> </li>
                                                        <li> &nbsp; <strong>DPSU Clearance <i class="text-info"> - 2 copies</i></strong> </li>
                                                    </ol>

                                                    <div style="font-size: 12pt"><b>Note:</b> Please bring Original Copy of Photocopied Documents for Authentication</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </section>
@endsection
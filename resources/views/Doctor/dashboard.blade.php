@extends('Doctor.index')

@section('title')
    Main Page
@endsection

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-fluid">

                <div class="mb-8">
                    <!--begin::Row-->
                    <div class="row mb-5 g-5">
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <!--begin::Statistics Widget 5-->
                            <div class="card home-card" style="background-color: #464E47;">
                                <!--begin::Body-->
                                <div class="card-body">
                                    <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm002.svg-->
                                    <span class="svg-icon svg-icon-primary svg-icon-3x ms-n1">
                                        <svg width="32" height="32" viewBox="0 0 20 20">
                                            <path fill="#FFF"
                                                d="M9 6a3 3 0 1 1-6 0a3 3 0 0 1 6 0Zm8 0a3 3 0 1 1-6 0a3 3 0 0 1 6 0Zm-4.07 11c.046-.327.07-.66.07-1a6.97 6.97 0 0 0-1.5-4.33A5 5 0 0 1 19 16v1h-6.07ZM6 11a5 5 0 0 1 5 5v1H1v-1a5 5 0 0 1 5-5Z" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <div class="text-white fw-bolder fs-4 mb-2 mt-5">
                                        Total Patients
                                    </div>
                                    <div class="fw-bold fs-2 fw-bolder text-white">{{ $patient }}</div>
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Statistics Widget 5-->
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <!--begin::Statistics Widget 5-->
                            <div class="card home-card" style="background-color: #568259;">
                                <!--begin::Body-->
                                <div class="card-body">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen008.svg-->
                                    <span class="svg-icon svg-icon-primary svg-icon-3x ms-n1">

                                        <svg width="32" height="32" viewBox="0 0 256 256">
                                            <path fill="#FFF"
                                                d="M240 208h-8V104a16 16 0 0 0-16-16h-64V40a16 16 0 0 0-16-16H40a16 16 0 0 0-16 16v168h-8a8 8 0 0 0 0 16h224a8 8 0 0 0 0-16Zm-120-72a8 8 0 0 1-8 8H80a8 8 0 0 1 0-16h32a8 8 0 0 1 8 8ZM64 64h32a8 8 0 0 1 0 16H64a8 8 0 0 1 0-16Zm0 104h32a8 8 0 0 1 0 16H64a8 8 0 0 1 0-16Zm88-64h64v104h-64Zm48 72a8 8 0 0 1-8 8h-16a8 8 0 0 1 0-16h16a8 8 0 0 1 8 8Zm-32-40a8 8 0 0 1 8-8h16a8 8 0 0 1 0 16h-16a8 8 0 0 1-8-8Z" />
                                        </svg>

                                    </span>
                                    <!--end::Svg Icon-->
                                    <div class="text-white fw-bolder fs-4 mb-2 mt-5">
                                        Total Appointments
                                    </div>
                                    <div class="fw-bold fs-2 fw-bolder text-white">{{ $bookappointment }}</div>
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Statistics Widget 5-->
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <!--begin::Statistics Widget 5-->
                            <div class="card home-card" style="background-color: #4FB477">
                                <!--begin::Body-->
                                <div class="card-body">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr070.svg-->
                                    <span class="svg-icon svg-icon-primary svg-icon-3x ms-n1">

                                        <svg width="32" height="32" viewBox="0 0 24 24">
                                            <path fill="#FFF"
                                                d="M20 4a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h16m-9 9H9v2h2v-2m8 0h-6v2h6v-2M7 9H5v2h2V9m12 0H9v2h10V9Z" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <div class="text-white fw-bolder fs-4 mb-2 mt-5">
                                        Total prescriptions
                                    </div>
                                    <div class="fw-bold fs-2 fw-bolder text-white">{{ $prescription }}</div>
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Statistics Widget 5-->
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <!--begin::Statistics Widget 5-->
                            <div class="card home-card" style="background-color: #3F6634">
                                <!--begin::Body-->
                                <div class="card-body">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr070.svg-->
                                    <span class="svg-icon svg-icon-primary svg-icon-3x ms-n1">

                                        <svg width="36" height="32" viewBox="0 0 576 512">
                                            <path fill="#FFF"
                                                d="M248 0h-40c-26.5 0-48 21.5-48 48v112c0 35.3 28.7 64 64 64h128c35.3 0 64-28.7 64-64V48c0-26.5-21.5-48-48-48h-40v80c0 8.8-7.2 16-16 16h-48c-8.8 0-16-7.2-16-16V0zM64 256c-35.3 0-64 28.7-64 64v128c0 35.3 28.7 64 64 64h160c35.3 0 64-28.7 64-64V320c0-35.3-28.7-64-64-64h-40v80c0 8.8-7.2 16-16 16h-48c-8.8 0-16-7.2-16-16v-80H64zm288 256h160c35.3 0 64-28.7 64-64V320c0-35.3-28.7-64-64-64h-40v80c0 8.8-7.2 16-16 16h-48c-8.8 0-16-7.2-16-16v-80h-40c-15 0-28.8 5.1-39.7 13.8c4.9 10.4 7.7 22 7.7 34.2v160c0 12.2-2.8 23.8-7.7 34.2C323.2 506.9 337 512 352 512z" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <div class="text-white fw-bolder fs-4 mb-2 mt-5">
                                        Total Treatments
                                    </div>
                                    <div class="fw-bold fs-2 fw-bolder text-white">{{ $Treatments }}</div>
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Statistics Widget 5-->
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <!--begin::Statistics Widget 5-->
                            <div class="card home-card" style="background-color: #227C70">
                                <!--begin::Body-->
                                <div class="card-body">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr070.svg-->
                                    <span class="svg-icon svg-icon-primary svg-icon-3x ms-n1">

                                        <svg width="32" height="32" viewBox="0 0 24 24">
                                            <path fill="#FFF"
                                                d="M20 2H4c-1.1 0-1.99.9-1.99 2L2 22l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-3 12H7c-.55 0-1-.45-1-1s.45-1 1-1h10c.55 0 1 .45 1 1s-.45 1-1 1zm0-3H7c-.55 0-1-.45-1-1s.45-1 1-1h10c.55 0 1 .45 1 1s-.45 1-1 1zm0-3H7c-.55 0-1-.45-1-1s.45-1 1-1h10c.55 0 1 .45 1 1s-.45 1-1 1z" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <div class="text-white fw-bolder fs-4 mb-2 mt-5">
                                        Total Medical Tests
                                    </div>
                                    <div class="fw-bold fs-2 fw-bolder text-white">{{ $medicaltest }}</div>
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--end::Statistics Widget 5-->
                        </div>





                    </div>
                    <!--end::Row-->
                </div>
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
@endsection

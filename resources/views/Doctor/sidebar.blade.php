<style>
    .menu-link {
        text-decoration: none;
        color: white;
        transition: background-color 0.3s ease;
    }

    .menu-link:hover {
        background-color: red;
        color: white;
    }

    .menu-link.active {
        background-color: red !important;
        color: white !important;
    }
</style>

<div id="kt_aside" class="aside" data-kt-drawer="true" data-kt-drawer-name="aside"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
    data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
    data-kt-drawer-toggle="#kt_aside_mobile_toggle">
    <!--begin::Aside Toolbar-->
    <div class="aside-toolbar flex-column-auto" id="kt_aside_toolbar">
        <!--begin::Aside user-->
        <!--end::Aside user-->
    </div>
    <!--end::Aside Toolbar-->
    <!--begin::Aside menu-->
    <div class="aside-menu flex-column-fluid">
        <!--begin::Aside Menu-->
        <div class="hover-scroll-overlay-y px-2 my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
            data-kt-scroll-height="auto"
            data-kt-scroll-dependencies="{default: '#kt_aside_toolbar, #kt_aside_footer', lg: '#kt_header, #kt_aside_toolbar, #kt_aside_footer'}"
            data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="5px">
            <!--begin::Menu-->
            <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
                id="#kt_aside_menu" data-kt-menu="true">

                <div class="menu-item">
                    <a class="menu-link {{ request()->routeIs('dashboardDoctor.index') ? 'active' : '' }}"
                        href="{{ route('dashboardDoctor.index') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                    width="24px" fill="white">
                                    <path
                                        d="M240-200h120v-240h240v240h120v-360L480-740 240-560v360Zm-80 80v-480l320-240 320 240v480H520v-240h-80v240H160Zm320-350Z" />
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Home</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link {{ request()->routeIs('patientD.index') ? 'active' : '' }}"
                        href="{{ route('patientD.index') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                    width="24px" fill="white">
                                    <path
                                        d="M480-560q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47Zm0-80q33 0 56.5-23.5T560-720q0-33-23.5-56.5T480-800q-33 0-56.5 23.5T400-720q0 33 23.5 56.5T480-640ZM160-80v-271q0-34 17-62.5t47-44.5q51-26 115.5-44T480-520q76 0 140.5 18T736-458q30 16 47 44.5t17 62.5v191q0 33-23.5 56.5T720-80H390q-46 0-78-32t-32-78q0-46 32-78t78-32h113l62-132q-20-4-41-6t-44-2q-72 0-128 17.5T261-386q-10 5-15.5 14.5T240-351v271h-80Zm230-80h48l28-60h-76q-12 0-21 9t-9 21q0 12 9 21t21 9Zm136 0h194v-191q0-11-5.5-20.5T700-386q-12-6-26-12.5T644-411L526-160Zm-46-560Zm0 426Z" />
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Patients</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link {{ request()->routeIs('prescriptionD.index') ? 'active' : '' }}"
                        href="{{ route('prescriptionD.index') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                    width="24px" fill="white">
                                    <path
                                        d="M320-240h320v-80H320v80Zm0-160h320v-80H320v80ZM240-80q-33 0-56.5-23.5T160-160v-640q0-33 23.5-56.5T240-880h320l240 240v480q0 33-23.5 56.5T720-80H240Zm280-520v-200H240v640h480v-440H520ZM240-800v200-200 640-640Z" />
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Prescriptions</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link {{ request()->routeIs('treatmentD.index') ? 'active' : '' }}"
                        href="{{ route('treatmentD.index') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                    width="24px" fill="white">
                                    <path
                                        d="M345-120q-94 0-159.5-65.5T120-345q0-45 17-86t49-73l270-270q32-32 73-49t86-17q94 0 159.5 65.5T840-615q0 45-17 86t-49 73L504-186q-32 32-73 49t-86 17Zm266-286 107-106q20-20 31-47t11-56q0-60-42.5-102.5T615-760q-29 0-56 11t-47 31L406-611l205 205ZM345-200q29 0 56-11t47-31l106-107-205-205-107 106q-20 20-31 47t-11 56q0 60 42.5 102.5T345-200Z" />
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Treatments</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link {{ request()->routeIs('medicalTestsD.index') ? 'active' : '' }}"
                        href="{{ route('medicalTestsD.index') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                    width="24px" fill="white">
                                    <path
                                        d="M280-240h80v-80h80v-80h-80v-80h-80v80h-80v80h80v80Zm240-140h240v-60H520v60Zm0 120h160v-60H520v60ZM160-80q-33 0-56.5-23.5T80-160v-440q0-33 23.5-56.5T160-680h200v-120q0-33 23.5-56.5T440-880h80q33 0 56.5 23.5T600-800v120h200q33 0 56.5 23.5T880-600v440q0 33-23.5 56.5T800-80H160Zm0-80h640v-440H600q0 33-23.5 56.5T520-520h-80q-33 0-56.5-23.5T360-600H160v440Zm280-440h80v-200h-80v200Zm40 220Z" />
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Medical Tests</span>
                    </a>
                </div>
                {{-- <div class="menu-item">
                    <a class="menu-link {{ request()->routeIs('messagesD.index') ? 'active' : '' }}" href="{{ route('messagesD.index') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                    width="24px" fill="white">
                                    <path
                                        d="M240-160v-480h480v480H240Zm240-300h240v-60H480v60ZM240-240h480v-60H240v60ZM480-760v60h240v-60H480Zm-240 0h60v60h-60v-60Zm60 180h240v-60H300v60Zm0 180h240v-60H300v60Z" />
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Messages</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link {{ request()->routeIs('faqD.index') ? 'active' : '' }}" href="{{ route('faqD.index') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                    width="24px" fill="white">
                                    <path
                                        d="M480-640q50 0 87.5 37.5T605-480q0 50-37.5 87.5T480-355q-50 0-87.5-37.5T355-480q0-50 37.5-87.5T480-640Zm0 220q33 0 56.5-23.5T560-480q0-33-23.5-56.5T480-560q-33 0-56.5 23.5T400-480q0 33 23.5 56.5T480-420ZM240-80v-320h480v320H240Z" />
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">FAQs</span>
                    </a>
                </div> --}}
            </div>
            <!--end::Menu-->
        </div>
        <!--end::Aside Menu-->
    </div>
    <!--end::Aside menu-->
</div>

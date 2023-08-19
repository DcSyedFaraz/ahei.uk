@extends('layouts.web')
@section('title', 'Order Now')
@section('description', '')
@section('canonical', config('app.app_url') . Request::path())
@section('content')

    <style>
        .g-color {
            background: -webkit-linear-gradient(right, #73c04e, #26ACE2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .iti {
            margin-top:11px;

        }
    </style>

    <section class="container mx-auto w-[80%]">
        <div class="grid grid-col-3 sm:grid-cols-3 my-4 gap-x-4 gap-y-4  ">
            <div class="lg:col-span-2 md:col-span-3 sm:col-span-3 ">
                <div class="lg:grid-cols-3 rounded-xl">

                    @if (session('success'))
                        <div class="my-4 mx-auto bg-white border-t-4 border-primary-one rounded-b text-sm text-teal-900 px-4 py-3 shadow-md"
                            role="alert">

                            <p class="text-center font-bold">{{ session('success') }}</p>

                        </div>
                    @endif
                    <form action="{{ route('order.store') }}" id="order-form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="grid lg:col-span-2">

                            <div class="bg-white rounded-3xl shadow-xl">
                                <div class=" text-center ">
                                    <div class="bg-primary-one py-2  rounded-t-xl ">
                                        <p class="text-3xl text-white uppercase font-semibold text-center">Order Details</p>
                                    </div>
                                </div>
                                <div class="my-3 ml-4">


                                    Academic Level:
                                </div>

                                {{-- <div class="w-auto my-4 grid lg:grid-cols-4 gap-4 mx-4">

                                    <div class="">

                                        <input type="radio" onchange="syncRadio(this, 4)" id="ac_1"
                                            name="academic_level" data-source="College" value="1"
                                            class="get-fare hidden academic_level peer ">
                                        <label for="ac_1"
                                            class=" border-gray-500  hover:bg-orange-500   hover:text-white peer-checked:text-white peer-checked:bg-orange-500 transition ease-in-out delay-150 rounded-3xl shadow-md rounded-bl-none px-8 py-2 my-3 border-2 font-light">
                                            College</label>
                                    </div>
                                    @error('phone')
                                        <p class="text-red-600 text-sm">{{ $message }}</p>
                                    @enderror
                                    <div class="">


                                        <input type="radio" data-source="UnderGraduate" onchange="syncRadio(this, 4)"
                                            id="ac_2" name="academic_level" value="2"
                                            class="get-fare hidden academic_level peer ">
                                        <label for="ac_2"
                                            class="border-gray-500  hover:bg-orange-500 hover:text-white peer-checked:text-white peer-checked:bg-orange-400 transition ease-in-out delay-150 rounded-3xl shadow-md rounded-bl-none px-8 py-2 my-3 border-2 font-light">
                                            UnderGraduate</label>
                                    </div>
                                    <div class="">

                                        <input type="radio" data-source="Masters" onchange="syncRadio(this, 4)"
                                            id="ac_3" name="academic_level" value="3"
                                            class="get-fare academic_level hidden peer ">
                                        <label for="ac_3"
                                            class=" border-gray-500  hover:bg-orange-500 hover:text-white peer-checked:text-white peer-checked:bg-orange-400 transition ease-in-out delay-150 rounded-3xl shadow-md rounded-bl-none px-8 py-2 my-3 border-2 font-light">
                                            Masters</label>
                                    </div>
                                    <div class="">


                                        <input type="radio" data-source="Mphil/PhD" id="ac_4"
                                            onchange="syncRadio(this, 4)" name="academic_level" value="4"
                                            class="get-fare academic_level hidden peer ">
                                        <label for="ac_4"
                                            class="border-gray-500 hover:bg-orange-500 hover:text-white peer-checked:text-white peer-checked:bg-orange-400 transition ease-in-out delay-150 rounded-3xl shadow-md rounded-bl-none px-8 py-2 my-3 border-2 font-light">
                                            Mphil/PhD</label>
                                    </div>



                                </div> --}}
                                <div id="writer-level" class=" mt-2">
                                    <div class="btn-group w-auto my-4 grid lg:grid-cols-4 gap-4 mx-4" role="group">
                                        <button type="button" onclick="syncRadio(this, 4)" data-source="College"
                                            class="get-fare btn-group-item " academic-level="1">College</button>

                                        <button type="button" onclick="syncRadio(this, 4)" data-source="UnderGraduate"
                                            class="get-fare btn-group-item" academic-level="2">Undergraduate</button>
                                        <button type="button" onclick="syncRadio(this, 4)" data-source="Masters"
                                            class="get-fare btn-group-item" academic-level="3">Master</button>
                                        <button type="button" onclick="syncRadio(this, 4)" data-source="Mphil/Phd"
                                            class="get-fare btn-group-item" academic-level="4">Mphil/Phd</button>
                                    </div>
                                    <input type="hidden" name="academic_level" id="academic_level_id">
                                </div>
                                <div class="mx-4 my-1">
                                    @error('academic_level')
                                        <p class="text-red-600 text-sm">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="hidden lg:grid grid-cols-2 gap-4 mx-4 my-1">

                                    <span>
                                        Paper Type:

                                    </span><span>
                                        Subject Area:

                                    </span>
                                </div>

                                <div class="w-auto grid lg:grid-cols-2 gap-4 my-1 mx-4">
                                    <select name="paper_type" id="paper_type " onchange="syncFormData(this, 0)"
                                        class="border-gray-500 rounded-3xl rounded-bl-none shadow-sm my-3 p-2 border-2 font-light">
                                        <option value="0" hidden disabled selected>Paper Type</option>
                                        @foreach ($paper_types as $paper_type)
                                            <option {{ old('$paper_type') == $paper_type->id ? 'selected' : '' }}
                                                value="{{ $paper_type->id }}">
                                                {{ $paper_type->name }}
                                            </option>
                                        @endforeach
                                    </select><select name="subject" id="" onchange="syncFormData(this, 1)"
                                        class="border-gray-500 rounded-3xl rounded-bl-none shadow-sm my-3 p-2 border-2 font-light">
                                        <option value="0" disabled selected hidden>Subjects</option>
                                        @foreach ($subjects as $subject)
                                            <option {{ old('$subject ') == $subject->id ? 'selected' : '' }}
                                                value="{{ $subject->id }}">
                                                {{ $subject->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>

                                <div class="hidden lg:grid grid-cols-2 gap-4 mx-4 my-1">

                                    <span>
                                        Reference Style:


                                    </span><span>
                                        References:


                                    </span>
                                </div>

                                <div class="w-auto grid lg:grid-cols-2 gap-4 my-1 mx-4">
                                    <select name="reference_style" id="" onchange="syncFormData(this, 5)"
                                        class="border-gray-500 rounded-3xl rounded-bl-none shadow-sm my-3 p-2 border-2 font-light">
                                        <option value="0" hidden selected disabled>Reference Style</option>
                                        @foreach ($reference_styles as $reference_style)
                                            <option {{ old('$reference_style') == $reference_style->id ? 'selected' : '' }}
                                                value="{{ $reference_style->id }}">
                                                {{ $reference_style->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    <select name="style" id=""
                                        class="border-gray-500 rounded-3xl rounded-bl-none shadow-sm my-3 p-2 border-2 font-light">
                                        <option value="0" selected hidden disabled>References</option>
                                        @for ($i = 1; $i < 81; $i++)
                                            <option value={{ $i }}
                                                {{ old('reference') == $i ? 'selected' : '' }}>
                                                {{ $i }}
                                            </option>
                                        @endfor
                                    </select>

                                </div>
                                <div class="grid grid-cols-2 gap-4 mx-4 my-1">

                                    <span>
                                        @error('reference_style')
                                            <p class="text-red-600 text-sm">{{ $message }}</p>
                                        @enderror

                                    </span><span>
                                        @error('style')
                                            <p class="text-red-600 text-sm">{{ $message }}</p>
                                        @enderror

                                    </span>
                                </div>
                                <div class="grid grid-cols-1 gap-4 mx-4 my-1">

                                    <span>
                                        Topic:
                                    </span>
                                </div>

                                <div class="w-auto grid lg:grid-cols-1 gap-4 my-1 mx-4">
                                    <input type="text" name="paper_topic" placeholder="Topic...."
                                        class="border-gray-500 rounded-3xl rounded-bl-none shadow-sm my-3 p-2 border-2 font-light">
                                    @error('paper_topic')
                                        <p class="text-red-600 text-sm">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="grid grid-cols-1 gap-4 mx-4 my-1">

                                    <span>
                                        Paper Instructions:
                                    </span>
                                </div>
                                <div class="w-auto grid lg:grid-cols-1 gap-4 mx-4">
                                    <textarea rows="4" type="text" name="detail" placeholder="Write Your Instructions Here.. "
                                        class="border-gray-500 rounded-3xl rounded-bl-none shadow-sm my-3 p-2 border-2 font-light"></textarea>
                                    @error('detail')
                                        <p class="text-red-600 text-sm">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="grid grid-cols-2 gap-4 mx-4 my-1">

                                    <span>
                                        Pages:
                                    </span><span>
                                        Deadline:
                                    </span>
                                </div>

                                <div class="w-auto grid lg:grid-cols-2 gap-4 my-1 mx-4">
                                    <select name="number_of_pages" id="no_of_pages" onchange="syncFormData(this, 2)"
                                        class="get-fare border-gray-500 rounded-3xl rounded-bl-none shadow-sm my-3 p-2 border-2 font-light">
                                        {{-- <option value="0">No. of Pages and Words Count</option> --}}
                                        @for ($i = 1; $i < 200; $i++)
                                            <option {{ old('number_of_pages') == $i ? 'selected' : '' }}
                                                value="{{ $i }}">
                                                {{ 250 * $i . ' Words ' . ' / ' . $i . ' Pages ' }}
                                            </option>
                                        @endfor
                                    </select> @error('number_of_pages')
                                        <p class="text-red-600 text-sm">{{ $message }}</p>
                                    @enderror
                                    {{-- @dd($deadlines) --}}
                                    <select name="deadline" id="deadline_id" onchange="syncFormData(this, 3)"
                                        class="get-fare border-gray-500 rounded-3xl rounded-bl-none shadow-sm my-3 p-2 border-2 font-light">
                                        <option hidden="" selected disabled>Deadline</option>

                                        @foreach ($deadlines as $deadline)
                                            <option {{ old('$deadline') == $deadline->id ? 'selected' : '' }}
                                                value="{{ $deadline->id }}">
                                                {{ $deadline->name }}
                                            </option>
                                        @endforeach


                                    </select>




                                </div>
                                <div class="grid grid-cols-2 gap-4 mx-4 my-1">

                                    <span>


                                    </span><span>
                                        @error('deadline')
                                            <p class="text-red-600 text-sm">{{ $message }}</p>
                                        @enderror



                                    </span>
                                </div>

                                <div class="grid grid-cols-1 gap-4 mx-4 my-1">

                                    <span>
                                        Additional Material:
                                    </span>
                                </div>
                                <div id="uploadContainer"
                                    class="w-auto grid lg:grid-cols-1 gap-4 rounded-lg cursor-pointer">
                                    <span id="uploadLabel"
                                        class="text-center bg-gray-200 py-6 border-gray-500 border-2 border-dotted m-3"><i
                                            class="fas fa-cloud-upload-alt"></i>Click to upload file (max file attach : 10
                                        |
                                        max file
                                        size : 25Mb)
                                        <p class="text-primary-two text-sm">if file is larger then 25Mb then please email
                                            us on
                                            <a href="mailto:{{ $web_setting->email }}"
                                                class="hover:underline underline-offset-4 "> {{ $web_setting->email }}</a>
                                        </p>


                                    </span>
                                    <div class="">

                                        <input type="file" id="uploadInput" multiple="" name="emailAttachments[]"
                                            accept=".pdf,.ppt,.pptx,.doc,.docx,.xls,.xlsx,.csv,.txt,.jpeg,.jpg,.png,.gif,.sav,.sps,.spv,.spo,.mat,.zip,.rar"
                                            class=" inset-0 opacity-0 cursor-pointer">
                                    </div>

                                </div>




                            </div>


                            <div class="bg-white rounded-3xl mt-5 pb-5 shadow-xl">
                                <div class=" text-center ">
                                    <div class="bg-primary-one py-2  rounded-t-xl ">
                                        <p class="text-3xl text-white uppercase font-semibold text-center">Contact
                                            Information</p>
                                    </div>
                                </div>
                                <div class="hidden lg:grid grid-cols-2 gap-4 mx-4 my-1">

                                    <span>
                                        First Name:

                                    </span><span>
                                        Email:

                                    </span>
                                </div>

                                <div class="w-auto grid lg:grid-cols-2 gap-4 my-1 mx-4">
                                    <input type="text" placeholder="First Name" name="name"
                                        class="border-gray-500 rounded-3xl rounded-bl-none shadow-sm my-3 p-2 border-2 font-light">

                                    <input type="text" placeholder="Email" name="email"
                                        class="border-gray-500 rounded-3xl rounded-bl-none shadow-sm my-3 p-2 border-2 font-light">


                                </div>
                                <div class="grid grid-cols-2 gap-4 mx-4 my-1">

                                    <span>
                                        @error('name')
                                            <p class="text-red-600 text-sm">{{ $message }}</p>
                                        @enderror

                                    </span><span>
                                        @error('email')
                                            <p class="text-red-600 text-sm">{{ $message }}</p>
                                        @enderror

                                    </span>
                                </div>
                                <div class="hidden lg:grid grid-cols-2 gap-4 mx-4 my-1">

                                    <span>
                                        Country:

                                    </span><span>
                                        Phone No:

                                    </span>
                                </div>

                                <div class="w-auto grid lg:grid-cols-2 gap-4 my-1 mx-4">
                                    <select type="text" name="country"
                                        class="border-gray-500 rounded-3xl rounded-bl-none shadow-sm my-3 p-2 border-2 font-light">

                                        <option hidden="" value="0" disabled="" selected="">Country
                                        </option>
                                        @foreach ($countries as $country)
                                            <option {{ old('$country') == $country->id ? 'selected' : '' }}
                                                value="{{ $country->name }}">{{ $country->name }}</option>
                                        @endforeach
                                        {{-- <option value="AF">Afghanistan</option>
                                                                        <option value="AL">Albania</option>
                                                                        <option value="DZ">Algeria</option> --}}
                                    </select>


                                    <input id="phone" name="Phone" type="tel" name="phone"
                                        class="border-gray-500 rounded-3xl rounded-bl-none shadow-sm my-3 p-2 w-full border-2 font-light "
                                        placeholder="Phone" value="{{ old('phone') }}"
                                        oninput="this.value=this.value.replace(/[^0-9\+]/g,'');" autocomplete="off"
                                        data-intl-tel-input-id="0">
                                    <input id="phone2" name="phone" type="hidden">

                                </div>
                                <div class="grid grid-cols-2 gap-4 mx-4 my-1">

                                    <span>
                                        @error('country')
                                            <p class="text-red-600 text-sm">{{ $message }}</p>
                                        @enderror

                                    </span><span>
                                        @error('phone')
                                            <p class="text-red-600 text-sm">{{ $message }}</p>
                                        @enderror

                                    </span>
                                </div>
                                <div class="flex  justify-center">
                                    <button type="submit" id="btn-submit" class="rounded-t-xl btn hover:shadow-xl ">Submit</button>
                                </div>
                            </div>

                        </div>
                </div>

                </form>


            </div>


            <div class="grid lg:col-span-1 sm:col-span-3  mb-4">
                <div class=" shadow-xl bg-gradient-to-tr from-white to-primary-one rounded-xl ">
                    <form action="" id="ordersum" method="post">
                        <div class="order text-center py-3 font-sans font-bold text-3xl">
                            Order Summary
                            <div class="w-[80%] mx-auto my-3">
                                <hr>
                            </div>
                        </div>
                        <div class="grid lg:grid-cols-2 w-[95%] my-4 mx-auto">
                            <span class="text-start">
                                Type of Paper:
                            </span>
                            <span class="text-end" id="paper_type_data">

                                ---
                            </span>
                        </div>

                        <div class="grid lg:grid-cols-2 w-[95%] my-4 mx-auto">
                            <span class="text-start">
                                Subject:
                            </span>
                            <span class="text-end" id="subject_data">

                                ---
                            </span>
                        </div>

                        <div class="grid lg:grid-cols-2 w-[95%] my-4 mx-auto">
                            <span class="text-start">
                                No of Pages:

                            </span>
                            <span class="text-end" id="no_of_data">

                                ---
                            </span>
                        </div>



                        <div class="grid lg:grid-cols-2 w-[95%] my-4 mx-auto">
                            <span class="text-start">
                                Deadline:

                            </span>
                            <span class="text-end" id="deadline_data">
                                ---

                            </span>
                        </div>

                        <div class="grid lg:grid-cols-2 w-[95%] my-4 mx-auto">
                            <span class="text-start">
                                Academic Level:

                            </span>
                            <span class="text-end" id="level_data">
                                ---
                            </span>
                        </div>

                        <div class="grid lg:grid-cols-2 w-[95%] my-4 mx-auto">
                            <span class="text-start">
                                Reference Style:

                            </span>

                            <span class="text-end" id="referece_data">
                                ---
                            </span>
                        </div>

                        <div class="grid lg:grid-cols-2 w-[95%] my-4 mx-auto">
                            <span class="text-start">
                                Total:
                            </span>
                            <span class="text-end" id="total-cost">
                                0

                            </span>
                        </div>


                        <div class="grid lg:col-span-1 mt-[27%] w-[95%] my-4 mx-auto ">
                            <button type="submit"
                                class="bg-blue-500 text-white py-2 rounded-3xl border border-blue-800 rounded-bl-none font-bold
                    ">Checkout
                                Now</button>
                        </div>
                    </form>
                </div>




                <div class="  space-y-8 my-4">
                    <div class="panel">

                        <div
                            class="bg-white border border-t-4 border-b-4 border-primary-two py-2 px-5  shadow-xl rounded-t-lg rounded-b-lg p-5 flex flex-col md:ml-auto w-full ">
                            <p class="text-xl text-center  font-semibold pb-3">Any Questions?</p>
                            <h4 class="text-lg font-semibold flex flex-col justify-center items-center text-[#626262] ">
                                {{-- <a href="https://api.whatsapp.com/send?phone={{ $web_setting->contact }}"> Call --}}
                                {{-- Now:{{ '+' . $web_setting->contact }}</a> --}}
                                <a href="javascript:void(Tawk_API.toggle())" class="btn-sec-2 mt-4 mb-2">
                                    Live Chat
                                </a>
                            </h4>
                        </div>
                    </div>

                    <div
                        class="bg-white border border-t-4 border-b-4 border-primary-two py-2  shadow-xl px-5 rounded-t-lg rounded-b-lg p-5 flex flex-col md:ml-auto w-full ">
                        <p class="text-xl text-center  font-semibold pb-3">We Accept</p>
                        <img class="h-6 " src="{{ asset('images/payment-methods.png') }}" alt=""
                            class="mx-auto">
                    </div>

                    <div
                        class="bg-white border border-t-4 border-b-4  shadow-xl border-primary-two py-2 px-5 rounded-t-lg rounded-b-lg p-5 flex flex-col md:ml-auto w-full ">

                        <img class="w-32 mx-auto" src="{{ asset('images/satisfaction-bg.png') }}" alt="">
                        <img class="w-56 mx-auto" src="{{ asset('images/moneyback-bg.png') }}" alt="">

                    </div>
                </div>
            </div>
        </div>

        </div>
    </section>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const uploadContainer = document.getElementById('uploadContainer');
            const uploadLabel = document.getElementById('uploadLabel');
            const uploadInput = document.getElementById('uploadInput');

            uploadContainer.addEventListener('click', function() {
                uploadInput.click();
            });

            uploadInput.addEventListener('change', function() {

                const file = uploadInput.files;

                // for (let i=0; i < file.length; i++){


                // }
                if (file) {
                    uploadLabel.textContent = file.length +" Files Uploaded";
                } else {
                    uploadLabel.textContent = 'Click to upload file';
                }
            });
        });


        // const loading =
        //     '<svg class="inline-block " width="40px" height="40px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" stroke="#ffffff"><g transform="rotate(0 50 50)"><rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#ffffff"><animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.9166666666666666s" repeatCount="indefinite"></animate></rect></g><g transform="rotate(30 50 50)"><rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#ffffff"><animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.8333333333333334s" repeatCount="indefinite"></animate></rect></g><g transform="rotate(60 50 50)"><rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#ffffff"><animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.75s" repeatCount="indefinite"></animate></rect></g><g transform="rotate(90 50 50)"><rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#ffffff"><animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.6666666666666666s" repeatCount="indefinite"></animate></rect></g><g transform="rotate(120 50 50)"><rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#ffffff"><animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.5833333333333334s" repeatCount="indefinite"></animate></rect></g><g transform="rotate(150 50 50)"><rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#ffffff"><animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.5s" repeatCount="indefinite"></animate></rect></g><g transform="rotate(180 50 50)"><rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#ffffff"><animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.4166666666666667s" repeatCount="indefinite"></animate></rect></g><g transform="rotate(210 50 50)"><rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#ffffff"><animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.3333333333333333s" repeatCount="indefinite"></animate></rect></g><g transform="rotate(240 50 50)"><rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#ffffff"><animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.25s" repeatCount="indefinite"></animate></rect></g><g transform="rotate(270 50 50)"><rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#ffffff"><animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.16666666666666666s" repeatCount="indefinite"></animate></rect></g><g transform="rotate(300 50 50)"><rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#ffffff"><animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.08333333333333333s" repeatCount="indefinite"></animate></rect></g><g transform="rotate(330 50 50)"><rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#ffffff"><animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="0s" repeatCount="indefinite"></animate></rect></g></svg>'
        // $('#cost').html(loading);

        const phoneInputField = document.querySelector("#phone");
        // console.log(phoneInputField);
        const phoneInput = window.intlTelInput(phoneInputField, {
            preferredCountries: ["ie"],
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
        });
        // console.log(phoneInput);
        $("#order-form").submit(function() {
            $('#order-form').find(':submit').attr("disabled", true);
            $('#btn-submit').html("Submiting...");
            const phoneNumber = phoneInput.getNumber();
            console.log(phoneNumber);
            $('#phone2').val(phoneNumber);
            return true;
        });
        // return true;
        function syncFormData(selectObject, dataSource) {




            var text = selectObject.options[selectObject.selectedIndex].text;

            switch (dataSource) {
                case 0:

                    var field = document.getElementById('paper_type_data');
                    field.innerHTML = text;
                    break;

                case 1:
                    var field = document.getElementById('subject_data');
                    field.innerHTML = text;
                    break;

                case 2:

                    var field = document.getElementById('no_of_data');
                    field.innerHTML = text;
                    break;

                case 3:
                    var field = document.getElementById('deadline_data');
                    field.innerHTML = text;
                    break;

                case 4:

                    var field = document.getElementById('level_data');
                    console.log(field);
                    field.innerHTML = "COLLEGE";
                    break;


                case 5:

                    var field = document.getElementById('referece_data');
                    field.innerHTML = text;
                    break;



                    //   const field = document.getElementById('paper_type_data');
            }

        }

        function syncRadio(selectObject, dataSource) {
            // var text2 = selectObject.value;
            var text2 = selectObject.getAttribute('data-source');

            var field = document.getElementById('level_data');
            console.log(field);
            field.innerHTML = text2;
        }



        $("#writer-level .btn-group[role='group'] button").on('click', function() {
            $(this).siblings().removeClass('btn-active')
            $(this).addClass('btn-active');
            console.log($('#academic_level_id').val($(this).attr('academic-level')));
        })





        const fares = @json($fares);
        // console.log(fares);



        $(".get-fare").on('click', function() {
            // e.preventDefault();
            // const academic_level = 1;
            // var academicLevels = document.getElementsByClassName('academic_level');
            // for (var i = 0; i < academicLevels.length; i++) {
            //     academicLevels[i].addEventListener('change', function() {
            //         if (this.checked) {
            //             var value = this.value;
            //             console.log(value);
            //             updateTotalCost();
            //         }
            //     });
            // }

            // $('#deadline, #no_of_pages').on('input', function() {
            //     updateTotalCost();
            // });

            const academicLevel = $('#academic_level_id').val();

            // console.log(academicLevel);

            const deadline = $('#deadline_id').val();

            // console.log(deadline);

            const no_of_pages = $('#no_of_pages').val() == null ? 1 : $('#no_of_pages').val();

            fares.forEach(fare => {
                if (deadline == fare.deadline_id && academicLevel == fare.academic_level_id) {
                    console.log(fare.per_page_price);
                    $('#cost-per-page').html(fare.per_page_price);
                    $('#total-cost').html(fare.per_page_price * no_of_pages);
                }
            });



            // function updateTotalCost() {

            // }

        });








        //         $(document).ready(function() {
        //   const academic_level = $('input[name="academic_level"]:checked').val();
        //   console.log(academic_level);
        // });
    </script>
@endsection

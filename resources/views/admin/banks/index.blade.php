@extends('admin.layout.master')
<x-admin.breadcrumb singleName='{{awtTrans("بنك")}}' deletebutton="true" addbutton="true" >
    <x-slot name="moreButtons">
    </x-slot> 
 </x-admin.breadcrumb >
@section('content')
    <section class="content">
         {{-- table --}}
            <x-admin.table >
                <x-slot name="tableHead">
                    <th>
                       <div class="form-checkbox">
                           <input type="checkbox" value="value1" name="name1" id="checkedAll">
                           <span class="check"><i class="zmdi zmdi-check zmdi-hc-lg"></i></span>
                       </div>
                    </th>
                    <th>{{awtTrans('الصوره')}}</th>
                    <th>{{awtTrans('اسم البنك')}}</th>
                    <th>{{awtTrans('رقم الايبان')}}</th>
                    <th>{{awtTrans('رقم الحساب')}}</th>
                    <th>{{awtTrans('التحكم')}}</th>
                </x-slot>
                <x-slot name="tableBody">
                    @foreach($rows as $row)
                        <tr class="delete_row_{{$row->id}}">
                            <td class="text-center">
                               <div class="form-checkbox">
                                   <input type="checkbox" class="checkSingle" id="{{$row->id}}">
                                   <span class="check"><i class="zmdi zmdi-check zmdi-hc-lg"></i></span>
                               </div>
                            </td>
                            <td><img src="{{$row->icon}}" alt=""></td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->iban}}</td>
                            <td>{{$row->account_name}}</td>
                            <td>
                                <x-admin.edit-button>
                                    <x-slot name="data">
                                            data-id               = '{{$row->id}}'
                                            data-route            = '{{route('admin.banks.update' , [$row->id])}}'
                                            data-name_ar          = '{{$row->getTranslations('name')['ar']}}'
                                            data-name_en          = '{{$row->getTranslations('name')['en']}}'
                                            data-icon             = '{{$row->icon}}'
                                            data-iban             = '{{$row->iban}}'
                                            data-account_number   = '{{$row->account_number}}'
                                            data-account_name     = '{{$row->account_name}}'
                                    </x-slot>
                                </x-admin.edit-button>
                                <x-admin.show-button>
                                    <x-slot name="data">
                                            data-name_ar          = '{{$row->getTranslations('name')['ar']}}'
                                            data-name_en          = '{{$row->getTranslations('name')['en']}}'
                                            data-icon             = '{{$row->icon}}'
                                            data-iban             = '{{$row->iban}}'
                                            data-account_number   = '{{$row->account_number}}'
                                            data-account_name     = '{{$row->account_name}}'    
                                    </x-slot>
                                </x-admin.show-button>
                                <x-admin.delete route="{{route('admin.banks.delete' , [$row->id])}}" />
                            </td>
                        </tr>
                    @endforeach
                </x-slot>
            </x-admin.table >
        {{-- #table --}}
    </section>

 <!-- add model -->
    <x-admin.AddModel route='{{route("admin.banks.store")}}' singleName='{{awtTrans("بنك")}}' >
        <x-slot name="inputs">
           <div class="col-12">
                <div class="imgMontg col-12 text-center">
                    <div class="dropBox">
                        <div class="textCenter">
                            <div class="imagesUploadBlock">
                                <label class="uploadImg">
                                    <span><i class="la la-image"></i></span>
                                    <input type="file" accept="image/*" name="icon" class="imageUploader">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('اسم البنك بالعربية')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="text" name="name_ar" class="form-control" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}">
                    </div>
                </div>
            </div>
            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('اسم البنك بالانجليزية')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="text" name="name_en" class="form-control" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}">
                    </div>
                </div>
            </div>

            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('رقم الحساب ')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="number" name="account_number" class="form-control" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}" data-validation-number-message="{{awtTrans('غير مسموح بالاحرف والرموز')}} " minlength="10" data-validation-minlength-message="{{awtTrans('يجب الا يقل الرقم عن عشر ارقام')}}">
                    </div>
                </div>
            </div>
            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('اسم الحساب ')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="text" name="account_name" class="form-control" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}" >
                    </div>
                </div>
            </div>
            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('رقم الايبان ')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="number" name="iban" class="form-control" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}" data-validation-number-message="{{awtTrans('غير مسموح بالاحرف والرموز')}} " minlength="10" data-validation-minlength-message="{{awtTrans('يجب الا يقل الرقم عن عشر ارقام')}}">
                    </div>
                </div>
            </div>
            
        </x-slot>
    </x-admin.AddModel >
 <!-- add model -->

 <!-- edit model -->
    <x-admin.edit-model singleName='{{awtTrans("بنك")}}' >
        <x-slot name="inputs">
          <div class="col-sm-12">  
                <div class="imgMontg">
                    <div class="dropBox">
                        <div class="textCenter">
                            <div class="imagesUploadBlock">
                                <label class="uploadImg">
                                    <span><i class="far fa-image"></i></span>
                                    <input type="file" accept="image/*" name="icon" class="imageUploader">
                                </label>
                                <div class="uploadedBlock">
                                    <img src=""  id="icon">
                                    <button class="close">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('اسم البنك بالعربية')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="text" name="name_ar" class="form-control" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}">
                    </div>
                </div>
            </div>
            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('اسم البنك بالانجليزية')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="text" name="name_en" class="form-control" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}">
                    </div>
                </div>
            </div>

            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('رقم الحساب ')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="number" name="account_number" class="form-control" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}" data-validation-number-message="{{awtTrans('غير مسموح بالاحرف والرموز')}} " minlength="10" data-validation-minlength-message="{{awtTrans('يجب الا يقل الرقم عن عشر ارقام')}}">
                    </div>
                </div>
            </div>
            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('اسم الحساب ')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="text" name="account_name" class="form-control" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}" >
                    </div>
                </div>
            </div>
            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('رقم الايبان ')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="number" name="iban" class="form-control" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}" data-validation-number-message="{{awtTrans('غير مسموح بالاحرف والرموز')}} " minlength="10" data-validation-minlength-message="{{awtTrans('يجب الا يقل الرقم عن عشر ارقام')}}">
                    </div>
                </div>
            </div>

        </x-slot>
    </x-admin.edit-model >
 <!-- add model -->
 
 <!-- show model -->
    <x-admin.show-model  singleName='{{awtTrans("بنك")}}' >
        <x-slot name="inputs">
          <div class="col-sm-12">  
                <div class="imgMontg">
                    <div class="dropBox">
                        <div class="textCenter">
                            <div class="imagesUploadBlock">
                                <label class="uploadImg">
                                    <span><i class="far fa-image"></i></span>
                                    <input type="file" accept="image/*" name="icon" class="imageUploader">
                                </label>
                                <div class="uploadedBlock">
                                    <img src=""  class="icon">
                                    <button class="close">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('اسم البنك بالعربية')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="text" name="name_ar" class="form-control" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}">
                    </div>
                </div>
            </div>
            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('اسم البنك بالانجليزية')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="text" name="name_en" class="form-control" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}">
                    </div>
                </div>
            </div>

            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('رقم الحساب ')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="number" name="account_number" class="form-control" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}" data-validation-number-message="{{awtTrans('غير مسموح بالاحرف والرموز')}} " minlength="10" data-validation-minlength-message="{{awtTrans('يجب الا يقل الرقم عن عشر ارقام')}}">
                    </div>
                </div>
            </div>
            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('اسم الحساب ')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="text" name="account_name" class="form-control" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}" >
                    </div>
                </div>
            </div>
            <div class="col-sm-6"> 
                <div class="form-group">
                    <h5>{{awtTrans('رقم الايبان ')}} 
                        <span class="required">*</span>
                    </h5>
                    <div class="controls">
                        <input type="number" name="iban" class="form-control" required data-validation-required-message="{{awtTrans('الحقل مطلوب')}}" data-validation-number-message="{{awtTrans('غير مسموح بالاحرف والرموز')}} " minlength="10" data-validation-minlength-message="{{awtTrans('يجب الا يقل الرقم عن عشر ارقام')}}">
                    </div>
                </div>
            </div>

        </x-slot>
    </x-admin.show-model >
 <!-- show model -->

{{-- delete all model  --}}
    <x-admin.delete-all route="{{route('admin.banks.deleteAll')}}" />
{{-- #delete all model  --}}

@endsection
<x-admin.scripts >
    <x-slot name='moreScript'>
        <x-admin.confirm-delete />
        <script>
            
        </script>
    </x-slot >
</x-admin.scripts >
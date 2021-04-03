@extends('layouts.main')

@section('content')
  <div class="flex justify-center">

    <div class="w-8/12 bg-white p-6 rounded-lg">
            <form action="{{route('address.update',[$user,$useraddress])}}" method="post">
            @csrf

            <div class="mb-4">
                  <label for="name" class="sr-only"> Name </label>
                  <input type="text" name="name" id="name" placeholder="Your name" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror" value="{{$useraddress->name}}">

                  @error('name')
                  <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                  </div>
                  @enderror

            </div>

            <div class="mb-4">
                  <label for="surname" class="sr-only"> Surname </label>
                  <input type="text" name="surname" id="surname" placeholder="Your Surname" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('surname') border-red-500 @enderror"  value="{{$useraddress->surname}}">

                  @error('surname')
                  <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                  </div>
                  @enderror

            </div>

            <div class="mb-4">
                  <label for="user_type" class="sr-only"> User Type </label>
                  <select name="user_type" id="user_type" >
                      <option value="individual">Individual</option>
                      <option value="institutional">Institutional</option>
                      <option selected="selected"> {{$useraddress->user_type}}</option>
                        </select>
                  </select>

            </div>
            <div class="mb-4">
                  <label for="company" class="sr-only"> Company </label>
                  <input type="text" name="company" id="company" placeholder="Your Company" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('company') border-red-500 @enderror" value="{{$useraddress->company}}">

                  @error('company')
                  <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                  </div>
                  @enderror
            </div>

            <div class="mb-4">
                  <label for="tax_no" class="sr-only"> Tax No </label>
                  <input type="text" name="tax_no" id="tax_no" placeholder="Your Tax No" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('tax_no') border-red-500 @enderror" value="{{$useraddress->tax_no}}">

                  @error('tax_no')
                  <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                  </div>
                  @enderror
            </div>

            <div class="mb-4">
                  <label for="country_id" class="sr-only"> Country </label>
                  <select name="country_id" id="country_id">
                        @if($countries->count())
                              @foreach($countries as $countries)
                                  <option value="{{ $countries->country_id}}"> {{$countries->name}}</option>
                              @endforeach
                              <option selected="selected"> {{$useraddress->country_id}}</option>

                        @endif
                  </select>
            </div>

            <div class="mb-4">
                  <label for="city" class="sr-only"> City </label>
                  <input type="text" name="city" id="city" placeholder="Your City" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('city') border-red-500 @enderror"value="{{$useraddress->city}}">

                  @error('city')
                  <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                  </div>
                  @enderror
            </div>

            <div class="mb-4">
                  <label for="address" class="sr-only"> Address </label>
                  <input type="text" name="address" id="address" placeholder="Your Address" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('address') border-red-500 @enderror" value="{{$useraddress->address}}">

                  @error('address')
                  <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                  </div>
                  @enderror
            </div>
            <div class="mb-4">
                  <label for="address_type" class="sr-only"> Address Type </label>
                  <input type="text" name="address_type" id="address_type" placeholder="Your Address Type" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('address_type') border-red-500 @enderror" value="{{$useraddress->address_type}}">

                  @error('address_type')
                  <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                  </div>
                  @enderror
            </div>
            <div class="mb-4">
                  <label for="postcode" class="sr-only"> Post Code </label>
                  <input type="text" name="postcode" id="postcode" placeholder="Your Post Code" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('postcode') border-red-500 @enderror" value="{{$useraddress->postcode}}">

                  @error('postcode')
                  <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                  </div>
                  @enderror
            </div>

            <div class="mb-4">
                  <label for="telephone" class="sr-only"> Telephone </label>
                  <input type="text" name="telephone" id="telephone" placeholder="Your Telephone" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('telephone') border-red-500 @enderror" value="{{$useraddress->telephone}}">

                  @error('telephone')
                  <div class="text-red-500 mt-2 text-sm">
                        {{$message}}
                  </div>
                  @enderror
            </div>

            <div>
                  <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full"> Update Address </button>
            </div>
      </form>

    </div>
    
  </div>
@endsection

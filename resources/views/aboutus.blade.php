@extends('layouts.app')

@section('content')
<style>
    .dark{color:rgba(55, 65, 81,1);}
    body{background:white !important;}
</style>
<div class="w-full text-gray-700 md:text-center text-2xl font-semibold">
    Our Members
</div>
  <div class="holder">
  
    <div class="card border w-96 hover:shadow-none relative flex flex-col mx-auto shadow-lg m-5">
      <img class="max-h-20 w-full opacity-80 absolute top-0" style="z-index:-1" src="https://unsplash.com/photos/h0Vxgz5tyXA/download?force=true&w=640" alt="" />
      <div class="profile w-full flex m-3 ml-4 text-white">
        <img class="w-28 h-28 p-1 bg-white rounded-full" src="{{asset('images/jovan.jpg')}}" alt=""/>
        <div class="title mt-11 ml-3 font-bold flex flex-col">
          <div class="name break-words">Jovanko Kenshian</div>
          <!--  add [dark] class for bright background -->
          <div class="add font-semibold text-sm italic dark">00000032025<br>Peran: Front End & Back End client & admin dalam pembuatan projek UAS praktek hotel</div>
        </div>
      </div>
    </div>
    <!-- card end -->
    <div class="card border w-96 hover:shadow-none relative flex flex-col mx-auto shadow-lg m-5">
      <img class="max-h-20 w-full opacity-80 absolute top-0" style="z-index:-1" src="https://unsplash.com/photos/iFPBRwZ4I-M/download?force=true&w=640" alt="" />
      <div class="profile w-full flex m-3 ml-4 text-white">
        <img class="w-28 h-28 p-1 bg-white rounded-full" src="{{asset('images/felix.jpg')}}" alt=""/>
        <div class="title mt-11 ml-3 font-bold flex flex-col">
          <div class="name break-words">Felix Fernando</div>
          <!--  add [dark] class for bright background -->
          <div class="add font-semibold text-sm italic dark">00000029055<br>Peran: Pembuatan Front End & Back End client & admin dalam pembuatan projek UAS teori rental</div>
        </div>
      </div>
    </div>
    <!-- card end -->
    <div class="card border w-96 hover:shadow-none relative flex flex-col mx-auto shadow-lg m-5">
      <img class="max-h-20 w-full opacity-80 absolute top-0" style="z-index:-1" src="https://unsplash.com/photos/w1_4YH5IhDg/download?force=true&w=640" alt="" />
      <div class="profile w-full flex m-3 ml-4 text-white">
        <img class="w-28 h-28 p-1 bg-white rounded-full" src="{{asset('images/richard.jpg')}}" alt=""/>
        <div class="title mt-11 ml-3 font-bold flex flex-col">
          <div class="name break-words">Richard Librata</div>
          <!--  add [dark] class for bright background -->
          <div class="add font-semibold text-sm italic dark">00000034104<br>Peran: Pembuatan fungsi CRUD barang dalam pembuatan projek UAS teori rental</div>
        </div>
      </div>
    </div>
    
    <!-- card end -->
  </div>
  @endsection

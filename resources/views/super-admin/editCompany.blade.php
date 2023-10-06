<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
    <h1>Edit admin company profile</h1>
    <form action={{route('superadmin.editCompany',['id'=>$admin->id,'idCompany'=>$company->id])}} method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="" class="form-label" >upload photo profile</label>
        <input type="file" class="form-control" name="photo">
    <label class="form-label" for="">nama</label>
    <input type="text" name="nama" value={{$company->nama}} class="form-control">
    <label class="form-label" for="">Company Name</label>
    <input type="text" name="companyName"  class="form-control" value={{$company->companyName}}>
    <label class="form-label" for="">Company Profile</label>
    <textarea name="companyProfile"  class="form-control"  cols="20" rows="5">{{$company->companyProfile}}</textarea> 
    <label for="" class="form-label">Address</label>
    <textarea name="location" id="" cols="20" class="form-control"  rows="5"> {{$company->location}} </textarea> 
    <button type="submit" class="btn btn-primary" >Submit</button>
</form>
</body>
</html>
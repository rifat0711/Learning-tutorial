<h1> This is about page </h1>

<a href= "{{ url('/') }}">Back to home</a>

<form action="{{ route('about.store') }}"  method= "POST">
   @csrf
  <input type="text" name="name" placeholder="Write your Name"><br>
  <input type="email"  name="email" placeholder= "Write your email"><br>
  <button type="submit">Submit </button>
</form>
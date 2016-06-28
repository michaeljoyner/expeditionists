<h3>Application to be a {{ $applicant->application_type }}</h3>
<hr>
<p><strong>Title: </strong>{{ $applicant->title }}</p>
<p><strong>Name: </strong>{{ $applicant->name }}</p>
<p><strong>Date of Birth: </strong>{{ $applicant->date_of_birth }}</p>
<p><strong>Phone: </strong>{{ $applicant->phone }}</p>
<p><strong>Email: </strong>{{ $applicant->email }}</p>
<p><strong>Address: </strong>{{ $applicant->address }}</p>
<p><strong>City: </strong>{{ $applicant->city }}</p>
<p><strong>Country: </strong>{{ $applicant->country }}</p>
<p><strong>Message/Project:</strong></p>
<p>{{ $applicant->project }}</p>
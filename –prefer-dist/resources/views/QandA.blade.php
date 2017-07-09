@extends('layouts.app')

@section('content')
</br></br></br>
<div class ='row'>
				<div class='col-lg-2'></div>
				<div class='col-lg-8' style='background-color:#ffffff;'>
						<div class='row'>
							<div class='col-lg-1'></div>
							<div class='col-lg-10' style='padding-bottom:50px'>
									@foreach ($questions as $question)
											<!--begining of a question-->
											<a href='answer?question_id={{$question->id}}'><h4>{{$question->title}}</h4></a>
											{{$question->content}}
											<br>
											<span style='background-color:#3399FF; color:#ffffff; height:30px;'>
												Answers:<span class='badge' style='background-color:red;'>{{$question->number_of_answers}}</span> softwork Answer:<span class='badge' style='background-color:red;'>{{$question->softwork_answer}}</span>
											</span>
											<span style='float:right;'>
												<img src='images/profilePics/{{$question->question_profile_pic}}' class='img-circle' alt='images/Screenshot.png' width='30' height='30'>
												{{$question->question_username}} 
												<span style='color:#3399FF' id='question_{{$question->id}}'>
												{{$question->time_asked->diffForHumans()}}
												</span>
											</span>
											<hr/>
											<!--end of a question-->
									@endforeach
							<!--script type="text/javascript" src="js/nicEdit/nicEdit.js"></script> <script type="text/javascript">
        						bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
 							</script-->
								<form role="form" method="post" action="/askQuestion" class="styledform">
									{{ csrf_field() }}
									<label><h3>Ask A Question</h3></label>
									<div class="form-group">
									  <label for="title"><p>Title your questiion</p></label>
									  <input type="text" class="form-control" rows="5" name="title" id="title" maxlength="5000" required autofocus>
									</div>
									<div class="form-group">
										<label><p>Question Catigory : </p></label>
										<label class="radio-inline">
									    	<input type="radio" name="catigory" value="phone" required autofocus>Phones
									    </label>
									    <label class="radio-inline">
									     	<input type="radio" name="catigory" value="computer" required autofocus>Computers
									    </label>
									    <label class="radio-inline">
									     	 <input type="radio" name="catigory" value="electronica" required autofocus>Electronics
									    </label>
									</div>
								    <div class="form-group">
									  <label for="comment"><p>Your Question content Max:5000 letters including space</p></label>
									  <textarea class="form-control" rows="5" name="content" id="content" maxlength="5000" required autofocus></textarea>
									</div>
								  <button type="submit" class="btn btn-default">Submit</button>
								</form>
							</div>
							<div class='col-lg-1'></div>
						</div>
				</div>
				<div class='col-lg-2'></div>
			</div>
		</br></br>
@endsection
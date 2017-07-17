@extends('layouts.app')

@section('content')
</br></br></br>
			<div class ='row'>
				<div class='col-lg-2'></div>
				<div class='col-lg-8' style='background-color:#ffffff;'>
						<div class='row'>
							<div class='col-lg-1'></div>
							<div class='col-lg-10' style='padding-bottom:50px'>
									<!--begining of the question-->
									<a><h4>{{$question_title}}</h4></a>
										{{$question_content}}
									<br>
									<span style='background-color:#3399FF; color:#ffffff; height:30px;'>
										Answers:<span class='badge' style='background-color:red;'>{{$question_number_of_answers}}</span> softwork Answer:<span class='badge' style='background-color:red;'>{{$question_softwork_answer}}</span><!--glyphicon-remove-->
									</span>
									<span style='float:right;'>
										<img src='images/profilePics/{{$question_profile_pic}}' class='img-circle' alt='images/Screenshot.png' width='30' height='30'>
										{{$question_username}} <span style='color:#3399FF'>{{$question_time_asked->diffForHumans()}}</span>
									</span>
									<hr/>
									<!--end of the question-->
							<h3>SoftWork Answer</h3>
							<div style='box-shadow: 0px 0px 5px #3333ff,0px 0px 5px  #ff3333,0px 0px 5px  #33ff33; padding:10px 10px 10px 10px;'>
							<!--begining of SoftWork answer-->
							Softwork is yet to given an answer to this question, registered users can post answers below.
							</div>
							<!--end of SoftWork answer-->
							<h3>Answers</h3>
							@foreach($answers as $answer)
								<!--begining of a answer-->
								<div style='box-shadow: 0px 0px 5px #3333ff,0px 0px 5px  #ff3333,0px 0px 5px  #33ff33; padding:10px 10px 10px 10px;'>
									{{$answer->content}}
									<br/>
									<span style='background-color:#3399FF; color:#ffffff; height:30px;'>
										likes:<span class="badge" style='background-color:green;'>{{$answer->likes}}</span>
									</span> &nbsp
									<a href="#">like <span class="glyphicon glyphicon-thumbs-up"></span></a>&nbsp &nbsp <a href="#">unlike <span class="glyphicon glyphicon-thumbs-down"></span></a>
									<span style='float:right;'>
										<img src="images/profilePics/{{$answer->answer_profile_pic}}" class="img-circle" alt="images/Screenshot.png" width="30" height="30">
										{{$answer->answer_username}} <span style='color:#3399FF'>{{$answer->time_answered->diffForHumans()}}</span>
									</span>
								</div>
								<br/>
								<!--end of a answer-->
							@endforeach
							<form role="form" class="styledform" method="post" action="/answerQuestion">
								{{ csrf_field() }}
								<input type="hidden" name="question_id" value="{{$question_id}}">
							    <div class="form-group">
								  <label for="comment"><h3>Post Your Answer</h3>Max:5000</label>
								  <textarea class="form-control" rows="5" name='content' id="comment" maxlength="5000"></textarea>
								</div>
							  <button type="submit" class="btn btn-default">Submit</button>
							</form>
							</div>
							<div class='col-lg-1'></div>
						</div>
				</div>
				<div class='col-lg-2'></div>
			</div>
@endsection
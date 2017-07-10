@extends('layouts.app')

@section('content')
<section id=>
 		<div class="container">
<div class ='row'>
				<div class='col-lg-2'></div>
				<div class='col-lg-8' style='background-color:#ffffff;'>						
				<div class='row'>
							<div class='col-lg-1'></div>
							<div class='col-lg-10' style='padding-bottom:50px'>
									<!--begining of post-->
									<br>
									<div class='row'>	
										<div class=col-lg-12>
											Softwork |
											<span style='color:#3399FF' id='blog'>
												{{$time_posted->diffForHumans()}}
											</span>|
											<a href='#comments'><span class='badge'>{{$number_of_comments}}</span> comment(s)</a>
											<a><h4>{{$title}}</h4></a>
											<img src="images/blog_posts/{{$image_name}}" class='img-rounded' alt='images' width='100%' height='100%'>
												{{$content}}
										</div>
									</div>
									<hr/>
									<!--end of post-->
							<h3 id='comments'>Comments</h3>
							@foreach($comments as $comment)
							<!--begining of a comment-->
								<div style='box-shadow: 0px 0px 5px #3333ff,0px 0px 5px  #ff3333,0px 0px 5px  #33ff33; padding:10px 10px 10px 10px;'>
									<span>
										<img src="images/Screenshot.png" class="img-circle" alt="images/Screenshot.png" width="30" height="30">
										{{$comment->comment_username}} <span style='color:#3399FF'>{{$comment->time_commented->diffForHumans()}}</span>
									</span><br/>
									{{$comment->comment}}
								</div>
							<!--end of a comment-->
							@endforeach
							<br/>
							<form role="form" class="styledform" method="post" action="/comment_on_blog_page">
								{{ csrf_field() }}
								<input type="hidden" name="blog_post_id" value="{{$blog_post_id}}">
							    <div class="form-group">
								  <label><h3>Post Your Comment</h3>Max:5000</label>
								  <textarea class="form-control" rows="5" name='content' id="comment" maxlength="5000"></textarea>
								</div>
							  <button type="submit" class="btn btn-default">Submit</button>
							</form>
							</br>
							<div class='col-lg-1'></div>
							</div>
				</div>
				<div class='col-lg-2'></div>
			</div>
		</div>
</section>
@endsection
<div class="comments-view-area">
    <h3 class="mb-5">{{$number_comment}} Comments</h3>
    {{-- ---------------------- comment ------------------ --}}
    @foreach ($comments as $comment)
    <div>
        <div class="single-comment-wrap mb-4 d-flex">
            <figure class="author-thumb">
                <a href="#" disabled>
                    <img src="uploads/user/customer/{{$comment->cus->avatar}}" alt="Author">
                </a>
            </figure>
            <div class="comments-info">
                <p class="mb-2">{{$comment->content}}</p>
                <div class="comment-footer d-flex justify-content-between">
                    <a href="#" class="author"><strong>{{$comment->cus->name}}</strong> ({{$comment->created_at->format('d-m-y H:i')}})</a>
                    <a class="btn-show-reply" data-id="{{$comment->id}}"><i class="fa fa-reply"></i> Reply</a>
                </div>
            </div>
        </div>
                {{-- --------comment con--------- --}}
                @foreach ($comment->replies as $child)
                    <div class="single-comment-wrap mb-4 comment-reply d-flex">
                        <figure class="author-thumb">
                            <a href="#">
                                <img src="uploads/user/customer/{{$child->cus->avatar}}" alt="Author">
                            </a>
                        </figure>
                        <div class="comments-info">
                            <p class="mb-2">{{$child->content}}</p>
                            <div class="comment-footer d-flex justify-content-between">
                                <a href="#" class="author"><strong>{{$child->cus->name}} </strong>({{$child->created_at->format('d-m-y H:i')}})</a>
                                {{-- <a href="#" class="author"><strong>Jack</strong> - July 30, 2021</a> <a href="#" class="btn-reply"><i class="fa fa-reply"></i> Reply</a> --}}
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="from-reply single-comment-wrap comment-reply comment-reply-box-{{$comment->id}}" style="display:none;">
                    <form action="#">
                        <div class="comment-box">
                            <h3>Reply Comment</h3>
                            {{-- <input type="hidden" value="{{$post->id}}" name="post_id"> --}}
                            <div class="row">
                                <div class="col-12 col-custom">
                                    <div class="input-item mt-4 mb-4">
                                        <textarea id="content-reply-{{$comment->id}}" cols="30" rows="5" name="reply_comment" class="border rounded-0 w-100 custom-textarea input-area" placeholder="Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-12 col-custom mt-40">
                                    <button data-id="{{$comment->id}}" type="submit" class="btn obrien-button primary-btn rounded-0 w-100 btn-send-comment-reply">Post comment</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
    </div>
    @endforeach
</div>
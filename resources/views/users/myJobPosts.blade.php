<section class="content" id="myJobPosts">
<h3>Jobs</h3>

<div class="table-container">
    <table class="table table-filter">
        <tbody>
            @foreach ($myJobPosts as $myJobPost)
                <tr data-status="pending">
                    <td>
                        <div class="media">
                            <a href="#" class="pull-left">
                                <img src="{{url('/img/logo.png')}}" class="media-photo"/>
                            </a>
                            <div class="media-body">
                                <span class="media-meta pull-right">{{date("F j, Y g:i a", strtotime($myJobPost->created_at))}}</span>
                                <h4 class="title">
                                    {{$myJobPost->title}}

                                    <span class="pull-right pending">({{$myJobPost->status}})</span>
                                </h4>
                                <p class="summary">{{$myJobPost->description}}</p>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</section>

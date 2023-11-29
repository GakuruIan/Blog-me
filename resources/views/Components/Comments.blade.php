@props(['comments'])


<div class="mt-2">
    <h4 class="text-base">Comments</h4>
    
    @if (count($comments) > 0)
         @foreach ($comments as $comment)
            <div class="py-2 border-b border-gray-300">
                <p class="text-base font-medium mb-1">{{$comment->username}}</p>
                <p class="text-base">{{$comment->comment}}</p>
            </div>
        @endforeach
    @else
    <div class="py-2 border-b border-gray-300">
        <p class="text-xl text-center font-medium mb-1">No comments</p>
      </div>
    @endif 
       
</div>
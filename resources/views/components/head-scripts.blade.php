@if(null !== $scriptBlocks)
    @foreach($scriptBlocks as $block)
        @foreach( $block->children as $script)
            {!! $script->input('script') !!}
        @endforeach
    @endforeach
@endif
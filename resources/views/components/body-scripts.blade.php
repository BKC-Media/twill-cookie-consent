@if(null !== $scriptBlocks)
    @foreach($scriptBlocks as $block)
        @foreach( $block->children as $script)
            {!! $script->input('body_script') !!}
        @endforeach
    @endforeach
@endif
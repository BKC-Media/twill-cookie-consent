@if(null !== $scriptBlocks)
    @foreach($scriptBlocks as $block)
        @foreach( $block->children as $script)
            {!! $script->input('footer_script') !!}
        @endforeach
    @endforeach
@endif
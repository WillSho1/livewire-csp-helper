@php
    // Works with or without nonce
    $nonce = isset($expression['nonce']) ? "nonce=\"{$expression['nonce']}\"" : '';
@endphp

<script {!! $nonce !!}>
    // Prevent Livewire from auto-starting
    window.Livewire = { start: () => {} }
</script>

@livewireScripts($expression ?? [])
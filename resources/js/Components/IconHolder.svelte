<script>
    export const small = false;
</script>

<style>
    .iconHolder {
        width: 2em;
        height: 2em;
    }

    .small {
        width: 1em;
        height: 1em;
    }
</style>

<div class='iconHolder' class:small={small}>
    <slot></slot>
</div>
<script lang="ts">
	import IconHolder from './IconHolder.svelte';
    export let text: string;
    export let onClick: () => void;
    export let style: string = '';
    export let marginTop: boolean = false;
    export let icon: boolean = false;
    export let color: string = '#00A667';
    export let fitContent: boolean = false;
</script>

<button 
    class:small={icon && !text}
    class:marginTop={marginTop} 
    class:fitContent={fitContent}
    style={style} 
    on:click={onClick}
>
    {#if text != undefined}
        {text}
    {/if}
    {#if icon}
        <div class="iconHolder">
            <slot></slot> 
        </div>
    {/if}
</button>

<style>
    button{
        color: white;
        padding: .5em 1em;
        border: 1px solid #00A667;
        background-color: #00A667;
        border-radius: .5em;
        font-size: 2em;
    }

    .fitContent{
        width: fit-content;
    }

    button:hover{
        cursor: pointer;
        background-color: #04bb75;
        color: white;
    }

    .marginTop{
        margin-top: 1em;
    }

    .iconHolder{
        width: 1em;
        height: 1em;
    }

    .small{
        padding: 0;
        border: none;
        background-color: transparent;
        color: #00A667;
    }

    .small:hover{
        background-color: transparent;
        color: #04bb75;
    }
</style>

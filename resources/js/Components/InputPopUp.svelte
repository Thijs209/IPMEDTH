<script>
  import Button from "./Button.svelte";
  import Input from "./Input.svelte";
  import MdClose from 'svelte-icons/md/MdClose.svelte'

  export let label;
  export let changeOverlayOpen;
  export let addGoal;
  export let text;
  export let updateText;
</script>

<div class="overlay">
  
</div>
<div class="container">
  <Button fitContent onClick={() => changeOverlayOpen()} icon>
    <MdClose />
  </Button>
  <Input onChange={updateText} value={text} text={label} />
  <Button onClick={addGoal} text='Opslaan' />
</div>

<style>
    .overlay{
      position: fixed;
      top: 0;
      left: 0;
      width: 100vw;
      height: 100vh;
      background-color: rgba(0,0,0,0.5);
      z-index: 99;
    }

    .container{
      background-color: #0d403d;
      border-radius: 10px;
      padding: 1em;
      display: grid;
      grid-template-columns: 1fr;
      gap: 1em;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      z-index: 100;
    }
</style>
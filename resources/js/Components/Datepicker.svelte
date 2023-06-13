<script>
  export let marginTop = false;
  export let text;
  export let onChange;
  export let key;
</script>

<div class:marginTop={marginTop}  class="inputContainer">
  <label for={text}>{text}</label>
  <input on:change={(e) => onChange(key, e.target.value)} name={text} type="date">
</div>
  
<style>
  input{
      width: 100%;
      border: 1px solid #00A667;
      border-radius: .5em;
      padding: .5em;
      font-size: 1.8em;
      font-family: Arial, Helvetica, sans-serif;
      resize: none;
  }

  .inputContainer{
        width: 30%;
        min-width: 40em;
    }

  .marginTop{
      margin-top: 1em;
  }

  label{
    font-size: 1.5em;
    margin-top: 1.5em;
    font-weight: 700;
    margin-bottom: 1em;
  }

  input:focus{
      outline: 1.2px solid #00A667;
  }
</style>
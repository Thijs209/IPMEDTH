<script>
	import BigInput from './../Components/BigInput.svelte';
	import { pop } from './../stores.js';

	function changePop(key, value) {
		pop.update((pop) => {
			pop.project[key] = value;
			return pop;
		});
	}
</script>

<p>Geef aan wat je in de komende periode gaat doen.</p>
<BigInput onChange={changePop} key="description" text="Wat is jouw opdracht en wat is het doel daarvan?" />
<BigInput onChange={changePop} key="result" text="Hoe moet het eindresultaat eruit zien?" />
<BigInput onChange={changePop} key="succes" text="Wanneer ben je succesvol?" />
<BigInput onChange={changePop} key="manager" text="Wie is je leidinggevende?" />
<BigInput onChange={changePop} key="bosses" text="Rapporteer je nog naar anderen?" />

<style>
    
</style>
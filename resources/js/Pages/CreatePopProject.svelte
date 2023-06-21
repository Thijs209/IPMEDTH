<script>
	import BigInput from './../Components/BigInput.svelte';
	export let pop;
	export let updatePop;

	console.log(pop);

	let project = pop.task || {};
	function changeProject(key, value) {
		project[key] = value;
		updatePop('task', project)
	}
</script>

<p>Geef aan wat je in de komende periode gaat doen.</p>
<BigInput onChange={changeProject} value={pop.task?.goal} key="goal" text="Wat is jouw opdracht en wat is het doel daarvan?" />
<BigInput onChange={changeProject} value={pop.task?.results} key="results" text="Hoe moet het eindresultaat eruit zien?" />
<BigInput onChange={changeProject} value={pop.task?.success} key="success" text="Wanneer ben je succesvol?" />
<BigInput onChange={changeProject} value={pop.task?.manager} key="manager" text="Wie is je leidinggevende?" />
<BigInput onChange={changeProject} value={pop.task?.reportsOthers} key="reportsOthers" text="Rapporteer je nog naar anderen?" />

<style>
    p{
			font-size: 1.5em;
		}
</style>
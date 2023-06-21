<script>
	import BigInput from './../Components/BigInput.svelte';
	export let pop;
	export let updatePop;

	let project = {};
	function changeProject(key, value) {
		project[key] = value;
		updatePop('task', project)
	}
</script>

<p>Geef aan wat je in de komende periode gaat doen.</p>
<BigInput onChange={changeProject} value={pop.project?.description} key="description" text="Wat is jouw opdracht en wat is het doel daarvan?" />
<BigInput onChange={changeProject} value={pop.project?.results} key="results" text="Hoe moet het eindresultaat eruit zien?" />
<BigInput onChange={changeProject} value={pop.project?.success} key="success" text="Wanneer ben je succesvol?" />
<BigInput onChange={changeProject} value={pop.project?.manager} key="manager" text="Wie is je leidinggevende?" />
<BigInput onChange={changeProject} value={pop.project?.reportOthers} key="reportOthers" text="Rapporteer je nog naar anderen?" />

<style>
    p {
		font-size: 1.5em;
        font-weight: 500;
	}
</style>
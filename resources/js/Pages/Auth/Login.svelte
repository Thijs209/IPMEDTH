<script>
    import { useForm, page } from "@inertiajs/svelte";

    let form = useForm({
        email: null,
        password: null,
        remember: false,
    });

    function submit() {
        $form.post("/login", {
            onsuccess: () => {
                $page.visit($page.props.auth.user ? "/home" : "/login");
            },
        });
    }
</script>

<form on:submit|preventDefault={submit}>
    <input type="text" bind:value={$form.email} />
    {#if $form.errors.email}
        <div class="form-error">{$form.errors.email}</div>
    {/if}
    <input type="password" bind:value={$form.password} />
    {#if $form.errors.password}
        <div class="form-error">{$form.errors.password}</div>
    {/if}
    <input type="checkbox" bind:checked={$form.remember} /> Remember Me
    <button type="submit" disabled={$form.processing}>Submit</button>
</form>
*

<style>
    /* your styles go here */
</style>

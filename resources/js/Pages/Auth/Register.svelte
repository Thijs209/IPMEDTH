<script>
    import Layout from "./../../Layouts/Layout.svelte";
    import { useForm, page } from "@inertiajs/svelte";

    let form = useForm({
        first_name: null,
        last_name: null,
        username: null,
        email: null,
        password: null,
        password_confirmation: null,
    });

    function submit(e) {
        $form.post("/register", {
            onsuccess: () => {
                $page.visit(
                    $page.props.auth.user.username ? "/home" : "/login"
                );
            },
        });
    }
</script>

<Layout centeredContent={true}>
    <article slot="main" class="register">
        <h2 class="register__heading">Register Page</h2>
        <form class="form" on:submit|preventDefault={submit}>
            <div class="form__group">
                <label class="form__label" for="email">Email</label>
                <input
                    id="email"
                    class="form__input"
                    type="text"
                    bind:value={$form.email}
                />
                {#if $form.errors.email}
                    <div class="form-error">{$form.errors.email}</div>
                {/if}
            </div>

            <div class="form__group">
                <label class="form__label" for="first_name">First Name</label>
                <input
                    id="first_name"
                    required
                    class="form__input"
                    type="text"
                    bind:value={$form.first_name}
                />
                {#if $form.errors.first_name}
                    <div class="form-error">{$form.errors.first_name}</div>
                {/if}
            </div>
            <div class="form__group">
                <label class="form__label" for="last_name">Last name</label>
                <input
                    id="last_name"
                    required
                    class="form__input"
                    type="text"
                    bind:value={$form.last_name}
                />
                {#if $form.errors.last_name}
                    <div class="form-error">{$form.errors.last_name}</div>
                {/if}
            </div>

            <div class="form__group">
                <label class="form__label" for="username">Username</label>
                <input
                    id="username"
                    required
                    class="form__input"
                    type="text"
                    bind:value={$form.username}
                />
                {#if $form.errors.username}
                    <div class="form-error">{$form.errors.username}</div>
                {/if}
            </div>

            <!-- Password -->

            <div class="form__group">
                <label class="form__label" for="password">Password</label>
                <input
                    id="password"
                    required
                    class="form__input"
                    type="password"
                    bind:value={$form.password}
                />
                {#if $form.errors.password}
                    <div class="form-error">{$form.errors.password}</div>
                {/if}
            </div>

            <div class="form__group">
                <label class="form__label" for="password_confirmation"
                    >Password Confirmation</label
                >
                <input
                    id="password_confirmation"
                    required
                    class="form__input"
                    type="password"
                    bind:value={$form.password_confirmation}
                />
                {#if $form.errors.password_confirmation}
                    <div class="form-error">
                        {$form.errors.password_confirmation}
                    </div>
                {/if}
            </div>

            <button
                required
                class="form__button"
                type="submit"
                disabled={$form.processing}>Register</button
            >
        </form>
    </article>
</Layout>

<style>
    /* TODO Make re-usable form component styling */

    .register {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;

        min-width: 30rem;
        gap: 2rem;
        padding: 2rem;
        background-color: #fff;
        justify-self: center;
        align-self: center;
    }

    .register__heading {
        display: block;
        width: 100%;
        align-self: start;

        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 1rem;
    }

    .form {
        height: auto;
        display: flex;
        flex-flow: column nowrap;
        justify-content: center;
        align-items: center;
    }

    .form__group {
        display: flex;
        flex-flow: column wrap;
        width: 100%;
        align-self: center;
        justify-content: center;
        align-items: center;
        margin-bottom: 1rem;
    }

    .form__label {
        display: flex;
        height: 2rem;
        align-self: flex-start;
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }

    .form__input {
        width: 100%;
        height: 3rem;
        border-radius: 0.5rem;
        border: 1px solid #ccc;
        padding: 0 1rem;
        font-size: 1.5rem;
    }

    .form__button {
        width: 100%;
        align-self: center;
        height: 3rem;
        border-radius: 0.5rem;
        border: 1px solid #ccc;
        padding: 0 1rem;
        font-size: 1.5rem;
        background-color: var(--c-primary-button);
        color: #fff;
    }

    .form__button:hover {
        background-color: var(--c-primary-button-hover);
        cursor: pointer;
    }
</style>

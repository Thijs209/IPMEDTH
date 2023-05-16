<script>
    import { json } from "@sveltejs/kit";

    let user = "World";
    let data = @json($data);
</script>

<div>
    <h1>Hello {user}!</h1>
</div>

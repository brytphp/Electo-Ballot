<template>
    <div id="app">

        <form @submit.prevent="login" @keydown="form.onKeydown($event)">

            <div class="form-group row">
                <label for="election" class="col-form-label col-lg-2">Election</label>
                <div class="col-lg-10">
                    <input v-model="form.election" :class="{ 'is-invalid': form.errors.has('election') }" id="election"
                        type="text" class="form-control" placeholder="eg. 2020 IT Council Election">
                    <has-error :form="form" field="election"></has-error>
                </div>
            </div>

            <div class="form-group row">
                <label for="slug" class="col-form-label col-lg-2">Slug</label>
                <div class="col-lg-10">
                    <input v-model="form.slug" :class="{ 'is-invalid': form.errors.has('slug') }" id="slug" type="text"
                        class="form-control" v-slugify placeholder="eg. it-council-election">
                    <has-error :form="form" field="slug"></has-error>
                </div>
            </div>

            <Button :form="form" class="btn btn-outline-dark waves-effect float-right waves-light">Submit</Button>

            <input v-model="form.election" type="text" name="election" placeholder="election">
            <div v-if="form.errors.has('election')" v-html="form.errors.get('election')" />

            <input v-model="form.slug" type="text" name="slug" placeholder="slug">
            <div v-if="form.errors.has('slug')" v-html="form.errors.get('slug')" />

            <button type="submit" :disabled="form.busy">
                Log In
            </button>
        </form>

        <br><br>
        <button class="btn btn-outline-prima
            v-on:click=" $toast.show('Welcome!', 'Hey' )">Show</button>&nbsp;
        <button class="btn btn-outline-secondary" v-on:click="$toast.show('Welcome!', 'Hey')">Ballon</button>&nbsp;
        <button class="btn btn-outline-info" v-on:click="$toast.info('Welcome!', 'Hello')">Info</button>&nbsp;
        <button class="btn btn-outline-success"
            v-on:click="$toast.success('Successfully inserted record!', 'OK')">Success</button>&nbsp;
        <button class="btn btn-outline-warning"
            v-on:click="$toast.warning('You forgot important data', 'Caution')">Warning</button>&nbsp;
        <button class="btn btn-outline-danger" v-on:click="$toast.error('Illegal operation', 'Error')">Error</button>&nbsp;
        <button class="btn btn-outline-dark"
            v-on:click="$toast.question('Are you sure about that?', 'Hey')">Question</button>
    </div>
</template>

<script>
export default {
    name: "App",
    data: () => ({
        form: new Form({
            election: '',
            slug: ''
        })
    }),
    async login() {
        const response = await this.form.post(this.route('admin.ballot.election.index'))
        // ...
    }
};

</script>


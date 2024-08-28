<div x-data="{
    message: '',
    errors: [],
    orderItems: [],
    formData: {},
    file: null,

    addItem(route) {
        axios.post(route, this.formData).then(response => {
            //Handle successful response
            console.log(response.data);
            this.message = response.data.message;
            this.orderItems = response.data.orderItems;
            this.show = false;
            this.formData = {};
            this.errors = [];
        }).catch(error => {
            // Handle error
            this.message = '';
            this.errors = error.response.data.errors;
            console.error(error);
        });
    },

    indexItems(route) {
        this.message = 'loading...';
        axios.get(route).then(response => {
            //Handle successful response
            console.log(response.data);
            this.orderItems = response.data.orderItems;
            this.message = '';
            this.errors = [];
        }).catch(error => {
            // Handle error
            this.errors = error.response.data.errors;
            console.error(error);
        });
    },

    updateItem(route, id) {
        axios.put(route + '/' + id, this.formData).then(response => {
            //Handle successful response
            console.log(response.data);
            this.message = response.data.message;
            this.orderItems = response.data.orderItems;
            this.show = false;
            this.formData = {};
            this.errors = [];
        }).catch(error => {
            // Handle error
            this.message = '';
            this.errors = error.response.data.errors;
            console.error(error);
        });
    },

    deleteItem(route, id) {
        axios.delete(route + '/' + id).then(response => {
            //Handle successful response
            console.log(response.data);
            this.message = response.data.message;
            this.orderItems = response.data.orderItems;
            this.show = false;
            this.errors = [];
        }).catch(error => {
            // Handle error
            this.message = '';
            this.errors = error.response.data.errors;
            console.error(error);
        });

    },

    submitFile(route) {
        const formData = new FormData();
        formData.append('file', this.file);

        fetch(route, {
                method: 'POST',
                body: formData,
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                // Handle the server response
            })
            .catch(error => {
                console.error(error);
            });
    }


}">
    {{ $slot }}
</div>

let actions={
	createPost({commit},post) {
		axios.post('/api/posts',post)
			.then(res => {
				commit('CREATE_POST',res.data);
			}).catch(error => {
				if(error.response.status===422) {
					commit('RECORD_ERRORS',error.response.data.errors);
				}
			});
	},
	fetchPosts({commit}) {
		commit('LOADING',true);
		axios.get('/api/posts')
			.then(res => {
				console.log(res);
				commit('FETCH_POSTS',res.data.data);
				commit('LOADING',false);
			}).catch(err => {
				console.log(err);
			});
	},
	deletePost({commit},post) {
		axios.delete(`/api/posts/${post.id}`)
			.then(res => {
				if(res.data==='ok')
					commit('DELETE_POST',post);
			}).catch(err => {
				console.log(err);
			});
	},
};

export default actions;
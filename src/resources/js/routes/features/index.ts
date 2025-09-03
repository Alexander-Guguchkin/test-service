import { queryParams, type RouteQueryOptions, type RouteDefinition, applyUrlDefaults } from './../../wayfinder'
/**
* @see \App\Http\Controllers\FeatureController::index
* @see app/Http/Controllers/FeatureController.php:20
* @route '/features'
*/
export const index = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: index.url(options),
    method: 'get',
})

index.definition = {
    methods: ["get","head"],
    url: '/features',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\FeatureController::index
* @see app/Http/Controllers/FeatureController.php:20
* @route '/features'
*/
index.url = (options?: RouteQueryOptions) => {
    return index.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\FeatureController::index
* @see app/Http/Controllers/FeatureController.php:20
* @route '/features'
*/
index.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: index.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\FeatureController::index
* @see app/Http/Controllers/FeatureController.php:20
* @route '/features'
*/
index.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: index.url(options),
    method: 'head',
})

/**
* @see \App\Http\Controllers\FeatureController::create
* @see app/Http/Controllers/FeatureController.php:29
* @route '/features/create'
*/
export const create = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: create.url(options),
    method: 'get',
})

create.definition = {
    methods: ["get","head"],
    url: '/features/create',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\FeatureController::create
* @see app/Http/Controllers/FeatureController.php:29
* @route '/features/create'
*/
create.url = (options?: RouteQueryOptions) => {
    return create.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\FeatureController::create
* @see app/Http/Controllers/FeatureController.php:29
* @route '/features/create'
*/
create.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: create.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\FeatureController::create
* @see app/Http/Controllers/FeatureController.php:29
* @route '/features/create'
*/
create.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: create.url(options),
    method: 'head',
})

/**
* @see \App\Http\Controllers\FeatureController::store
* @see app/Http/Controllers/FeatureController.php:38
* @route '/features'
*/
export const store = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: store.url(options),
    method: 'post',
})

store.definition = {
    methods: ["post"],
    url: '/features',
} satisfies RouteDefinition<["post"]>

/**
* @see \App\Http\Controllers\FeatureController::store
* @see app/Http/Controllers/FeatureController.php:38
* @route '/features'
*/
store.url = (options?: RouteQueryOptions) => {
    return store.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\FeatureController::store
* @see app/Http/Controllers/FeatureController.php:38
* @route '/features'
*/
store.post = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: store.url(options),
    method: 'post',
})

/**
* @see \App\Http\Controllers\FeatureController::show
* @see app/Http/Controllers/FeatureController.php:47
* @route '/features/{feature}'
*/
export const show = (args: { feature: string | number } | [feature: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: show.url(args, options),
    method: 'get',
})

show.definition = {
    methods: ["get","head"],
    url: '/features/{feature}',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\FeatureController::show
* @see app/Http/Controllers/FeatureController.php:47
* @route '/features/{feature}'
*/
show.url = (args: { feature: string | number } | [feature: string | number ] | string | number, options?: RouteQueryOptions) => {
    if (typeof args === 'string' || typeof args === 'number') {
        args = { feature: args }
    }

    if (Array.isArray(args)) {
        args = {
            feature: args[0],
        }
    }

    args = applyUrlDefaults(args)

    const parsedArgs = {
        feature: args.feature,
    }

    return show.definition.url
            .replace('{feature}', parsedArgs.feature.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\FeatureController::show
* @see app/Http/Controllers/FeatureController.php:47
* @route '/features/{feature}'
*/
show.get = (args: { feature: string | number } | [feature: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: show.url(args, options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\FeatureController::show
* @see app/Http/Controllers/FeatureController.php:47
* @route '/features/{feature}'
*/
show.head = (args: { feature: string | number } | [feature: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: show.url(args, options),
    method: 'head',
})

/**
* @see \App\Http\Controllers\FeatureController::edit
* @see app/Http/Controllers/FeatureController.php:56
* @route '/features/{feature}/edit'
*/
export const edit = (args: { feature: string | number } | [feature: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: edit.url(args, options),
    method: 'get',
})

edit.definition = {
    methods: ["get","head"],
    url: '/features/{feature}/edit',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\FeatureController::edit
* @see app/Http/Controllers/FeatureController.php:56
* @route '/features/{feature}/edit'
*/
edit.url = (args: { feature: string | number } | [feature: string | number ] | string | number, options?: RouteQueryOptions) => {
    if (typeof args === 'string' || typeof args === 'number') {
        args = { feature: args }
    }

    if (Array.isArray(args)) {
        args = {
            feature: args[0],
        }
    }

    args = applyUrlDefaults(args)

    const parsedArgs = {
        feature: args.feature,
    }

    return edit.definition.url
            .replace('{feature}', parsedArgs.feature.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\FeatureController::edit
* @see app/Http/Controllers/FeatureController.php:56
* @route '/features/{feature}/edit'
*/
edit.get = (args: { feature: string | number } | [feature: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: edit.url(args, options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\FeatureController::edit
* @see app/Http/Controllers/FeatureController.php:56
* @route '/features/{feature}/edit'
*/
edit.head = (args: { feature: string | number } | [feature: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: edit.url(args, options),
    method: 'head',
})

/**
* @see \App\Http\Controllers\FeatureController::update
* @see app/Http/Controllers/FeatureController.php:65
* @route '/features/{feature}'
*/
export const update = (args: { feature: string | number } | [feature: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'put'> => ({
    url: update.url(args, options),
    method: 'put',
})

update.definition = {
    methods: ["put","patch"],
    url: '/features/{feature}',
} satisfies RouteDefinition<["put","patch"]>

/**
* @see \App\Http\Controllers\FeatureController::update
* @see app/Http/Controllers/FeatureController.php:65
* @route '/features/{feature}'
*/
update.url = (args: { feature: string | number } | [feature: string | number ] | string | number, options?: RouteQueryOptions) => {
    if (typeof args === 'string' || typeof args === 'number') {
        args = { feature: args }
    }

    if (Array.isArray(args)) {
        args = {
            feature: args[0],
        }
    }

    args = applyUrlDefaults(args)

    const parsedArgs = {
        feature: args.feature,
    }

    return update.definition.url
            .replace('{feature}', parsedArgs.feature.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\FeatureController::update
* @see app/Http/Controllers/FeatureController.php:65
* @route '/features/{feature}'
*/
update.put = (args: { feature: string | number } | [feature: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'put'> => ({
    url: update.url(args, options),
    method: 'put',
})

/**
* @see \App\Http\Controllers\FeatureController::update
* @see app/Http/Controllers/FeatureController.php:65
* @route '/features/{feature}'
*/
update.patch = (args: { feature: string | number } | [feature: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'patch'> => ({
    url: update.url(args, options),
    method: 'patch',
})

/**
* @see \App\Http\Controllers\FeatureController::destroy
* @see app/Http/Controllers/FeatureController.php:74
* @route '/features/{feature}'
*/
export const destroy = (args: { feature: string | number } | [feature: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'delete'> => ({
    url: destroy.url(args, options),
    method: 'delete',
})

destroy.definition = {
    methods: ["delete"],
    url: '/features/{feature}',
} satisfies RouteDefinition<["delete"]>

/**
* @see \App\Http\Controllers\FeatureController::destroy
* @see app/Http/Controllers/FeatureController.php:74
* @route '/features/{feature}'
*/
destroy.url = (args: { feature: string | number } | [feature: string | number ] | string | number, options?: RouteQueryOptions) => {
    if (typeof args === 'string' || typeof args === 'number') {
        args = { feature: args }
    }

    if (Array.isArray(args)) {
        args = {
            feature: args[0],
        }
    }

    args = applyUrlDefaults(args)

    const parsedArgs = {
        feature: args.feature,
    }

    return destroy.definition.url
            .replace('{feature}', parsedArgs.feature.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\FeatureController::destroy
* @see app/Http/Controllers/FeatureController.php:74
* @route '/features/{feature}'
*/
destroy.delete = (args: { feature: string | number } | [feature: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'delete'> => ({
    url: destroy.url(args, options),
    method: 'delete',
})

const features = {
    index,
    create,
    store,
    show,
    edit,
    update,
    destroy,
}

export default features
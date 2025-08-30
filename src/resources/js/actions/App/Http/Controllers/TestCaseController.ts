import { queryParams, type RouteQueryOptions, type RouteDefinition, applyUrlDefaults } from './../../../../wayfinder'
/**
* @see \App\Http\Controllers\TestCaseController::index
* @see app/Http/Controllers/TestCaseController.php:24
* @route '/test-cases'
*/
export const index = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: index.url(options),
    method: 'get',
})

index.definition = {
    methods: ["get","head"],
    url: '/test-cases',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\TestCaseController::index
* @see app/Http/Controllers/TestCaseController.php:24
* @route '/test-cases'
*/
index.url = (options?: RouteQueryOptions) => {
    return index.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\TestCaseController::index
* @see app/Http/Controllers/TestCaseController.php:24
* @route '/test-cases'
*/
index.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: index.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\TestCaseController::index
* @see app/Http/Controllers/TestCaseController.php:24
* @route '/test-cases'
*/
index.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: index.url(options),
    method: 'head',
})

/**
* @see \App\Http\Controllers\TestCaseController::create
* @see app/Http/Controllers/TestCaseController.php:33
* @route '/test-cases/create'
*/
export const create = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: create.url(options),
    method: 'get',
})

create.definition = {
    methods: ["get","head"],
    url: '/test-cases/create',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\TestCaseController::create
* @see app/Http/Controllers/TestCaseController.php:33
* @route '/test-cases/create'
*/
create.url = (options?: RouteQueryOptions) => {
    return create.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\TestCaseController::create
* @see app/Http/Controllers/TestCaseController.php:33
* @route '/test-cases/create'
*/
create.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: create.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\TestCaseController::create
* @see app/Http/Controllers/TestCaseController.php:33
* @route '/test-cases/create'
*/
create.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: create.url(options),
    method: 'head',
})

/**
* @see \App\Http\Controllers\TestCaseController::store
* @see app/Http/Controllers/TestCaseController.php:42
* @route '/test-cases'
*/
export const store = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: store.url(options),
    method: 'post',
})

store.definition = {
    methods: ["post"],
    url: '/test-cases',
} satisfies RouteDefinition<["post"]>

/**
* @see \App\Http\Controllers\TestCaseController::store
* @see app/Http/Controllers/TestCaseController.php:42
* @route '/test-cases'
*/
store.url = (options?: RouteQueryOptions) => {
    return store.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\TestCaseController::store
* @see app/Http/Controllers/TestCaseController.php:42
* @route '/test-cases'
*/
store.post = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: store.url(options),
    method: 'post',
})

/**
* @see \App\Http\Controllers\TestCaseController::show
* @see app/Http/Controllers/TestCaseController.php:51
* @route '/test-cases/{test_case}'
*/
export const show = (args: { test_case: string | number } | [test_case: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: show.url(args, options),
    method: 'get',
})

show.definition = {
    methods: ["get","head"],
    url: '/test-cases/{test_case}',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\TestCaseController::show
* @see app/Http/Controllers/TestCaseController.php:51
* @route '/test-cases/{test_case}'
*/
show.url = (args: { test_case: string | number } | [test_case: string | number ] | string | number, options?: RouteQueryOptions) => {
    if (typeof args === 'string' || typeof args === 'number') {
        args = { test_case: args }
    }

    if (Array.isArray(args)) {
        args = {
            test_case: args[0],
        }
    }

    args = applyUrlDefaults(args)

    const parsedArgs = {
        test_case: args.test_case,
    }

    return show.definition.url
            .replace('{test_case}', parsedArgs.test_case.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\TestCaseController::show
* @see app/Http/Controllers/TestCaseController.php:51
* @route '/test-cases/{test_case}'
*/
show.get = (args: { test_case: string | number } | [test_case: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: show.url(args, options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\TestCaseController::show
* @see app/Http/Controllers/TestCaseController.php:51
* @route '/test-cases/{test_case}'
*/
show.head = (args: { test_case: string | number } | [test_case: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: show.url(args, options),
    method: 'head',
})

/**
* @see \App\Http\Controllers\TestCaseController::edit
* @see app/Http/Controllers/TestCaseController.php:61
* @route '/test-cases/{test_case}/edit'
*/
export const edit = (args: { test_case: string | number } | [test_case: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: edit.url(args, options),
    method: 'get',
})

edit.definition = {
    methods: ["get","head"],
    url: '/test-cases/{test_case}/edit',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\TestCaseController::edit
* @see app/Http/Controllers/TestCaseController.php:61
* @route '/test-cases/{test_case}/edit'
*/
edit.url = (args: { test_case: string | number } | [test_case: string | number ] | string | number, options?: RouteQueryOptions) => {
    if (typeof args === 'string' || typeof args === 'number') {
        args = { test_case: args }
    }

    if (Array.isArray(args)) {
        args = {
            test_case: args[0],
        }
    }

    args = applyUrlDefaults(args)

    const parsedArgs = {
        test_case: args.test_case,
    }

    return edit.definition.url
            .replace('{test_case}', parsedArgs.test_case.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\TestCaseController::edit
* @see app/Http/Controllers/TestCaseController.php:61
* @route '/test-cases/{test_case}/edit'
*/
edit.get = (args: { test_case: string | number } | [test_case: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: edit.url(args, options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\TestCaseController::edit
* @see app/Http/Controllers/TestCaseController.php:61
* @route '/test-cases/{test_case}/edit'
*/
edit.head = (args: { test_case: string | number } | [test_case: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: edit.url(args, options),
    method: 'head',
})

/**
* @see \App\Http\Controllers\TestCaseController::update
* @see app/Http/Controllers/TestCaseController.php:71
* @route '/test-cases/{test_case}'
*/
export const update = (args: { test_case: string | number } | [test_case: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'put'> => ({
    url: update.url(args, options),
    method: 'put',
})

update.definition = {
    methods: ["put","patch"],
    url: '/test-cases/{test_case}',
} satisfies RouteDefinition<["put","patch"]>

/**
* @see \App\Http\Controllers\TestCaseController::update
* @see app/Http/Controllers/TestCaseController.php:71
* @route '/test-cases/{test_case}'
*/
update.url = (args: { test_case: string | number } | [test_case: string | number ] | string | number, options?: RouteQueryOptions) => {
    if (typeof args === 'string' || typeof args === 'number') {
        args = { test_case: args }
    }

    if (Array.isArray(args)) {
        args = {
            test_case: args[0],
        }
    }

    args = applyUrlDefaults(args)

    const parsedArgs = {
        test_case: args.test_case,
    }

    return update.definition.url
            .replace('{test_case}', parsedArgs.test_case.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\TestCaseController::update
* @see app/Http/Controllers/TestCaseController.php:71
* @route '/test-cases/{test_case}'
*/
update.put = (args: { test_case: string | number } | [test_case: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'put'> => ({
    url: update.url(args, options),
    method: 'put',
})

/**
* @see \App\Http\Controllers\TestCaseController::update
* @see app/Http/Controllers/TestCaseController.php:71
* @route '/test-cases/{test_case}'
*/
update.patch = (args: { test_case: string | number } | [test_case: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'patch'> => ({
    url: update.url(args, options),
    method: 'patch',
})

/**
* @see \App\Http\Controllers\TestCaseController::destroy
* @see app/Http/Controllers/TestCaseController.php:80
* @route '/test-cases/{test_case}'
*/
export const destroy = (args: { test_case: string | number } | [test_case: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'delete'> => ({
    url: destroy.url(args, options),
    method: 'delete',
})

destroy.definition = {
    methods: ["delete"],
    url: '/test-cases/{test_case}',
} satisfies RouteDefinition<["delete"]>

/**
* @see \App\Http\Controllers\TestCaseController::destroy
* @see app/Http/Controllers/TestCaseController.php:80
* @route '/test-cases/{test_case}'
*/
destroy.url = (args: { test_case: string | number } | [test_case: string | number ] | string | number, options?: RouteQueryOptions) => {
    if (typeof args === 'string' || typeof args === 'number') {
        args = { test_case: args }
    }

    if (Array.isArray(args)) {
        args = {
            test_case: args[0],
        }
    }

    args = applyUrlDefaults(args)

    const parsedArgs = {
        test_case: args.test_case,
    }

    return destroy.definition.url
            .replace('{test_case}', parsedArgs.test_case.toString())
            .replace(/\/+$/, '') + queryParams(options)
}

/**
* @see \App\Http\Controllers\TestCaseController::destroy
* @see app/Http/Controllers/TestCaseController.php:80
* @route '/test-cases/{test_case}'
*/
destroy.delete = (args: { test_case: string | number } | [test_case: string | number ] | string | number, options?: RouteQueryOptions): RouteDefinition<'delete'> => ({
    url: destroy.url(args, options),
    method: 'delete',
})

const TestCaseController = { index, create, store, show, edit, update, destroy }

export default TestCaseController
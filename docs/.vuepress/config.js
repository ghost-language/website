module.exports = {
    title: 'Ghost',
    description: 'A general-purpose object oriented programming language',

    plugins: [
        '@vuepress/last-updated',
        '@vuepress/back-to-top',
        '@vuepress/nprogress'
    ],

    themeConfig: {
        sidebar: [
            {
                title: 'Prologue',
                collapsable: false,
                children: [
                    'prologue/',
                    'prologue/behind-the-name',
                    'prologue/hello-world',
                ]
            },
            {
                title: 'Reference',
                collapsable: false,
                children: [
                    'reference/grammar-and-types',
                    // 'basic-types',
                    // 'classes',
                    // 'comments',
                    // 'contracts',
                    // 'functions',
                    // 'variables'
                ]
            }
        ]
    }
}
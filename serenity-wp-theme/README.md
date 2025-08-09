# Serenity Clinic Pro - Tema WordPress Moderno

Um tema WordPress premium totalmente personalizável via painel administrativo, desenvolvido especificamente para clínicas de estética de alto padrão.

## 🎨 **Características Principais**

### **Personalização Total via Painel**
- ✅ **8 cores personalizáveis** via Customizador
- ✅ **Todas as imagens configuráveis** (hero, features, CTA, logo)
- ✅ **Textos editáveis** sem tocar no código
- ✅ **CSS Variables** atualizadas automaticamente
- ✅ **Preview em tempo real** no Customizador

### **Estrutura Moderna**
- 🎯 **theme.json** com paleta de cores e tipografia
- 🎯 **Template parts** modulares e reutilizáveis
- 🎯 **Block patterns** personalizados
- 🎯 **Editor styles** consistentes
- 🎯 **Performance otimizada**

### **Compatibilidade Total**
- ✅ **WordPress 6.0+** com suporte completo ao editor de blocos
- ✅ **Elementor compatível** (pode ser usado junto)
- ✅ **Responsive design** para todos os dispositivos
- ✅ **SEO otimizado** e acessível
- ✅ **Gutenberg ready** com patterns customizados

## 📁 **Estrutura de Arquivos**

```
serenity-wp-theme/
├── style.css                    # Header do tema
├── functions.php               # Funcionalidades principais
├── theme.json                  # Configurações globais (cores, tipografia)
├── header.php                  # Cabeçalho principal
├── footer.php                  # Rodapé principal
├── index.php                   # Template principal
├── page.php                    # Template de páginas
├── front-page.php             # Template da página inicial
├── inc/
│   └── customizer.php         # Configurações do Customizador
├── template-parts/
│   ├── header-site.php        # Cabeçalho do site
│   ├── footer-site.php        # Rodapé do site
│   ├── hero.php               # Seção hero
│   ├── features.php           # Seção diferenciais
│   └── cta.php                # Seção call-to-action
├── assets/
│   ├── css/
│   │   ├── main.css           # CSS principal com variables
│   │   └── editor.css         # Estilos do editor
│   ├── js/
│   │   ├── main.js            # JavaScript principal
│   │   └── customizer-preview.js # Preview do customizador
│   └── img/
│       └── placeholder.jpg    # Imagens placeholder
└── complete-elementor-template.json # Template completo para Elementor
```

## 🎨 **Sistema de Cores**

### **CSS Variables (Atualizadas Automaticamente)**
```css
:root {
    --color-primary: #eab308;     /* Cor principal (botões, links) */
    --color-secondary: #5f7a5f;   /* Cor secundária (elementos de apoio) */
    --color-accent: #334133;      /* Cor de destaque (títulos) */
    --color-background: #fefdfb;  /* Cor de fundo principal */
    --color-text: #3d4f3d;        /* Cor do texto */
    --color-light: #f6f7f6;       /* Cor clara (seções alternadas) */
    --color-white: #ffffff;       /* Branco */
    --color-dark: #2b362b;        /* Cor escura (rodapé) */
}
```

### **Configuração no Painel**
1. Acesse **Aparência > Personalizar**
2. Vá em **"Cores do Site"**
3. Altere qualquer cor e veja a mudança em tempo real
4. Clique em **"Publicar"** para salvar

## 🖼️ **Sistema de Imagens**

### **Imagens Configuráveis**
- **Logo do Site** (`site_logo`)
- **Hero Background** (`hero_bg`) - 1920x1080px
- **Hero Imagem Principal** (`hero_image`) - Flexível
- **6 Imagens de Diferenciais** (`feature_1_img` até `feature_6_img`) - 400x300px
- **CTA Background** (`cta_bg`) - 1920x600px

### **Como Configurar**
1. Acesse **Aparência > Personalizar**
2. Vá em **"Imagens do Site"**
3. Clique em qualquer campo de imagem
4. Faça upload ou selecione da biblioteca
5. As imagens são aplicadas automaticamente

## 📝 **Personalização de Conteúdo**

### **Textos Editáveis via Painel**
- **Hero**: Título, subtítulo, texto do botão, link do botão
- **Features**: Título da seção + 6 diferenciais (título e descrição cada)
- **CTA**: Título, descrição, texto do botão, link do botão
- **Contato**: Telefone, WhatsApp, e-mail, endereço, horário
- **Redes Sociais**: Instagram, Facebook, YouTube, LinkedIn, Twitter

### **Como Editar**
1. **Aparência > Personalizar > Conteúdo do Site**
2. **Aparência > Personalizar > Informações de Contato**
3. **Aparência > Personalizar > Redes Sociais**

## 🧩 **Block Patterns Incluídos**

### **Patterns Disponíveis no Editor**
1. **Hero Section** - Seção hero completa com background e CTA
2. **Features Section** - Grid de 3 colunas com diferenciais
3. **CTA Section** - Chamada para ação com background

### **Como Usar**
1. Edite qualquer página com o editor de blocos
2. Clique no **"+"** para adicionar blocos
3. Vá na aba **"Patterns"**
4. Procure pela categoria **"Serenity Clinic"**
5. Clique no pattern desejado

## 🚀 **Instalação e Configuração**

### **Passo 1: Instalação**
1. Faça download do tema
2. Acesse **Aparência > Temas > Adicionar Novo**
3. Clique em **"Enviar Tema"**
4. Selecione o arquivo ZIP do tema
5. Clique em **"Instalar Agora"**
6. Ative o tema

### **Passo 2: Configuração Inicial**
1. **Aparência > Personalizar**
2. Configure as cores em **"Cores do Site"**
3. Adicione imagens em **"Imagens do Site"**
4. Edite textos em **"Conteúdo do Site"**
5. Configure contato em **"Informações de Contato"**

### **Passo 3: Criar Página Inicial**
1. Crie uma nova página chamada **"Início"**
2. Use os **Block Patterns** ou o **Template do Elementor**
3. Vá em **Configurações > Leitura**
4. Selecione **"Uma página estática"**
5. Escolha **"Início"** como página inicial

### **Passo 4: Configurar Menus**
1. **Aparência > Menus**
2. Crie um menu principal
3. Atribua à localização **"Menu Principal"**
4. Adicione páginas e links personalizados

## 🎯 **Template Elementor Incluído**

### **Arquivo: complete-elementor-template.json**
- 📄 **Página completa** com todas as seções
- 🎨 **Design profissional** e responsivo
- ⚡ **Pronto para importar** no Elementor
- 🔧 **Totalmente editável** após importação

### **Como Importar**
1. Instale o plugin **Elementor**
2. Vá em **Templates > Modelos Salvos**
3. Clique em **"Importar Modelos"**
4. Selecione o arquivo **complete-elementor-template.json**
5. Após importar, use o template em qualquer página

## ⚙️ **Funcionalidades Avançadas**

### **Performance**
- ✅ CSS e JS minificados e otimizados
- ✅ Lazy loading de imagens
- ✅ Preload de recursos críticos
- ✅ Scripts carregados de forma assíncrona
- ✅ Remoção de recursos desnecessários do WordPress

### **SEO e Acessibilidade**
- ✅ Estrutura semântica HTML5
- ✅ Schema markup para clínicas
- ✅ Alt text automático para imagens
- ✅ Skip links para navegação por teclado
- ✅ Contraste adequado de cores
- ✅ Suporte a leitores de tela

### **Segurança**
- ✅ Remoção da versão do WordPress
- ✅ Sanitização de todos os inputs
- ✅ Nonces para formulários
- ✅ Escape de outputs
- ✅ Validação de permissões

## 🎨 **Customização Avançada**

### **Adicionando Novas Cores**
1. Edite `inc/customizer.php`
2. Adicione novo setting e control
3. Atualize a função `serenity_get_css_variables()`
4. Adicione a nova variável CSS em `assets/css/main.css`

### **Adicionando Novas Imagens**
1. Edite `inc/customizer.php`
2. Adicione novo `WP_Customize_Image_Control`
3. Use `serenity_get_theme_image()` nos templates
4. Adicione placeholder em `assets/img/`

### **Criando Novos Block Patterns**
1. Edite `functions.php`
2. Adicione novo `register_block_pattern()`
3. Use as CSS variables e classes do tema
4. Teste no editor de blocos

## 📱 **Responsividade**

### **Breakpoints**
- **Desktop**: 1024px+
- **Tablet**: 768px - 1023px
- **Mobile**: até 767px

### **Grid System**
- **Container**: max-width 1200px
- **Gutters**: 20px (mobile) / 32px (desktop)
- **Columns**: CSS Grid com auto-fit
- **Flexbox**: Para alinhamentos e distribuição

## 🔧 **Desenvolvimento**

### **CSS Variables**
Todas as cores são controladas por CSS variables que são atualizadas automaticamente quando o usuário muda as cores no Customizador.

### **Funções Utilitárias**
- `get_theme_color($var)` - Retorna cor específica
- `serenity_get_theme_image($option, $fallback)` - Retorna imagem com fallback
- `serenity_get_placeholder_image($type)` - Retorna placeholder específico

### **Hooks Disponíveis**
- `serenity_before_header` - Antes do cabeçalho
- `serenity_after_header` - Depois do cabeçalho
- `serenity_before_footer` - Antes do rodapé
- `serenity_after_footer` - Depois do rodapé

## 📋 **Checklist Pós-Instalação**

- [ ] Tema instalado e ativado
- [ ] Cores personalizadas configuradas
- [ ] Todas as imagens adicionadas
- [ ] Textos personalizados editados
- [ ] Informações de contato atualizadas
- [ ] Redes sociais configuradas
- [ ] Menus criados e atribuídos
- [ ] Página inicial definida
- [ ] Plugins recomendados instalados
- [ ] Teste em dispositivos móveis
- [ ] Verificação de performance
- [ ] Backup realizado

## 🔌 **Plugins Recomendados**

### **Essenciais**
- **Yoast SEO** - Otimização para mecanismos de busca
- **Contact Form 7** - Formulários de contato
- **W3 Total Cache** - Cache e performance

### **Opcionais**
- **Elementor** - Para usar o template incluído
- **WooCommerce** - Se quiser vender produtos
- **Smush** - Otimização de imagens
- **Wordfence** - Segurança

## 📞 **Suporte**

### **Documentação**
- Todos os arquivos estão comentados
- Funções documentadas no código
- Exemplos de uso incluídos

### **Personalização**
- Use sempre um tema filho para modificações
- Mantenha backups antes de atualizações
- Teste mudanças em ambiente de desenvolvimento

## 📄 **Licença**

Este tema é licenciado sob GPL v2 ou posterior, assim como o WordPress.

---

**Versão:** 2.0.0  
**Compatibilidade:** WordPress 6.0+  
**PHP:** 8.0+  
**Testado até:** WordPress 6.4

O tema está pronto para uso e oferece total flexibilidade de personalização sem necessidade de conhecimento técnico! 🎉
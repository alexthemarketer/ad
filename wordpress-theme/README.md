# Serenity Clinic WordPress Theme

Um tema WordPress premium desenvolvido especificamente para clínicas de estética de alto padrão. Design sofisticado com foco em agendamentos online e apresentação profissional de serviços.

## Características

### Design e Estilo
- **Paleta de cores premium**: Tons neutros (branco, creme, bege) com detalhes dourados e toques de verde-oliva
- **Tipografia elegante**: Playfair Display para títulos e Inter para textos
- **Layout responsivo**: Otimizado para todos os dispositivos
- **Animações suaves**: Micro-interações e transições elegantes
- **Imagens de alta qualidade**: Suporte para galeria profissional

### Funcionalidades Principais
- **Agendamento online**: Sistema completo de reservas com formulário intuitivo
- **Gestão de serviços**: Post type customizado para tratamentos estéticos
- **Equipe profissional**: Apresentação detalhada dos especialistas
- **Galeria interativa**: Showcase do ambiente e resultados
- **Depoimentos**: Sistema de avaliações e feedback dos clientes
- **SEO otimizado**: Estrutura semântica e performance otimizada

### Post Types Customizados
1. **Serviços** (`services`)
   - Descrição detalhada
   - Duração e preços
   - Benefícios
   - Categorização

2. **Equipe** (`team`)
   - Perfil profissional
   - Especialidades
   - Certificações
   - Experiência

3. **Depoimentos** (`testimonials`)
   - Avaliações dos clientes
   - Sistema de estrelas
   - Tratamentos realizados

### Áreas de Widget
- Sidebar principal
- 3 colunas no rodapé
- Newsletter integrada

## Instalação

1. Faça o download do tema
2. Acesse o painel do WordPress
3. Vá em **Aparência > Temas > Adicionar Novo**
4. Clique em **Enviar Tema** e selecione o arquivo ZIP
5. Ative o tema após a instalação

## Configuração Inicial

### 1. Customizador
Acesse **Aparência > Personalizar** para configurar:

- **Seção Hero**
  - Título principal
  - Subtítulo
  - Imagem de fundo

- **Informações de Contato**
  - Telefone
  - E-mail
  - Endereço

### 2. Menus
Configure os menus em **Aparência > Menus**:
- **Menu Principal**: Navegação do cabeçalho
- **Menu Rodapé**: Links do rodapé

### 3. Widgets
Configure as áreas de widget em **Aparência > Widgets**:
- Sidebar Principal
- Rodapé 1, 2 e 3

### 4. Página Inicial
1. Crie uma nova página chamada "Início"
2. Vá em **Configurações > Leitura**
3. Selecione "Uma página estática"
4. Escolha "Início" como página inicial

## Criando Conteúdo

### Serviços
1. Vá em **Serviços > Adicionar Novo**
2. Preencha o título e descrição
3. Adicione uma imagem destacada
4. Configure os campos customizados:
   - Duração
   - Preço
   - Benefícios (um por linha)
5. Selecione a categoria do serviço

### Equipe
1. Vá em **Equipe > Adicionar Novo**
2. Adicione nome e biografia
3. Configure uma foto profissional
4. Preencha os campos customizados:
   - Cargo
   - Especialidade
   - Experiência
   - Certificações (uma por linha)

### Depoimentos
1. Vá em **Depoimentos > Adicionar Novo**
2. Use o nome do cliente como título
3. Adicione o depoimento no conteúdo
4. Configure os campos customizados:
   - Idade do cliente
   - Tratamento realizado
   - Avaliação (1-5 estrelas)
5. Adicione uma foto do cliente (opcional)

## Personalização

### Cores
As cores podem ser personalizadas no arquivo `assets/css/custom.css`:

```css
:root {
    --color-gold-500: #eab308; /* Cor principal dourada */
    --color-sage-700: #3d4f3d; /* Cor do texto */
    --color-cream-50: #fefdfb; /* Cor de fundo */
}
```

### Fontes
Para alterar as fontes, modifique no `functions.php`:

```php
wp_enqueue_style('serenity-fonts', 'https://fonts.googleapis.com/css2?family=SuaFonte:wght@400;600&display=swap');
```

### Layout
O layout pode ser personalizado através dos arquivos de template:
- `front-page.php`: Página inicial
- `header.php`: Cabeçalho
- `footer.php`: Rodapé
- `index.php`: Página de blog

## Formulário de Agendamento

O formulário de agendamento utiliza AJAX para envio. Para personalizar:

1. **Campos**: Edite o formulário em `front-page.php`
2. **Validação**: Modifique `assets/js/main.js`
3. **Processamento**: Ajuste a função `serenity_handle_booking()` em `functions.php`

### Integração com E-mail
Para receber os agendamentos por e-mail, adicione em `functions.php`:

```php
function serenity_handle_booking() {
    // ... código de validação ...
    
    // Enviar e-mail
    $to = get_option('admin_email');
    $subject = 'Novo Agendamento - ' . $name;
    $message = "Nome: $name\nE-mail: $email\n...";
    
    wp_mail($to, $subject, $message);
    
    wp_send_json_success(array('message' => 'Agendamento realizado!'));
}
```

## Performance

### Otimizações Incluídas
- Carregamento lazy de imagens
- CSS e JS minificados
- Estrutura semântica HTML5
- Otimização para Core Web Vitals

### Plugins Recomendados
- **Yoast SEO**: Otimização para mecanismos de busca
- **W3 Total Cache**: Cache e performance
- **Smush**: Otimização de imagens
- **Contact Form 7**: Formulários avançados

## Suporte e Atualizações

### Documentação
- Consulte os comentários no código
- Verifique os arquivos de template
- Use o WordPress Codex como referência

### Backup
Sempre faça backup antes de:
- Atualizar o tema
- Modificar arquivos
- Instalar plugins

### Versionamento
- Versão atual: 1.0.0
- Compatibilidade: WordPress 5.0+
- PHP: 7.4+

## Licença

Este tema é licenciado sob GPL v2 ou posterior, assim como o WordPress.

## Créditos

- **Design**: Inspirado em clínicas de estética premium
- **Fontes**: Google Fonts (Playfair Display, Inter)
- **Ícones**: Lucide Icons
- **Imagens**: Pexels (para demonstração)

## Changelog

### v1.0.0
- Lançamento inicial
- Sistema completo de agendamento
- Post types customizados
- Design responsivo
- Otimizações de performance

---

Para suporte técnico ou dúvidas sobre personalização, consulte a documentação do WordPress ou entre em contato com um desenvolvedor qualificado.
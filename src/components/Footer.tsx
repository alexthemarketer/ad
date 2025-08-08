import React from 'react';
import { motion } from 'framer-motion';
import { Heart, MapPin, Phone, Mail, Instagram, Facebook, MessageCircle } from 'lucide-react';

const Footer = () => {
  const currentYear = new Date().getFullYear();

  return (
    <footer className="bg-gradient-to-b from-sage-800 to-sage-900 text-white">
      <div className="container mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div className="grid lg:grid-cols-4 gap-8">
          {/* Brand */}
          <motion.div
            initial={{ opacity: 0, y: 30 }}
            whileInView={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.6 }}
            viewport={{ once: true }}
            className="lg:col-span-1"
          >
            <div className="flex items-center space-x-2 mb-6">
              <div className="w-10 h-10 bg-gradient-to-br from-gold-400 to-gold-600 rounded-full flex items-center justify-center">
                <span className="text-white font-serif font-bold text-lg">S</span>
              </div>
              <div>
                <h3 className="font-serif text-xl font-semibold">Serenity</h3>
                <p className="text-xs text-sage-300 -mt-1">Aesthetic Clinic</p>
              </div>
            </div>
            <p className="text-sage-300 leading-relaxed mb-6">
              Há mais de 15 anos cuidando da sua beleza com excelência, dedicação e os mais altos padrões de qualidade.
            </p>
            <div className="flex space-x-4">
              <motion.a
                href="#"
                className="w-10 h-10 bg-sage-700 hover:bg-gold-500 rounded-full flex items-center justify-center transition-colors duration-200"
                whileHover={{ scale: 1.1 }}
                whileTap={{ scale: 0.9 }}
              >
                <Instagram size={18} />
              </motion.a>
              <motion.a
                href="#"
                className="w-10 h-10 bg-sage-700 hover:bg-gold-500 rounded-full flex items-center justify-center transition-colors duration-200"
                whileHover={{ scale: 1.1 }}
                whileTap={{ scale: 0.9 }}
              >
                <Facebook size={18} />
              </motion.a>
              <motion.a
                href="#"
                className="w-10 h-10 bg-sage-700 hover:bg-green-500 rounded-full flex items-center justify-center transition-colors duration-200"
                whileHover={{ scale: 1.1 }}
                whileTap={{ scale: 0.9 }}
              >
                <MessageCircle size={18} />
              </motion.a>
            </div>
          </motion.div>

          {/* Quick Links */}
          <motion.div
            initial={{ opacity: 0, y: 30 }}
            whileInView={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.6, delay: 0.1 }}
            viewport={{ once: true }}
          >
            <h4 className="font-serif text-lg font-semibold mb-6">Links Rápidos</h4>
            <ul className="space-y-3">
              {[
                { name: 'Início', href: '#home' },
                { name: 'Sobre Nós', href: '#about' },
                { name: 'Serviços', href: '#services' },
                { name: 'Galeria', href: '#gallery' },
                { name: 'Equipe', href: '#team' },
                { name: 'Contato', href: '#contact' },
              ].map((link, index) => (
                <li key={index}>
                  <motion.a
                    href={link.href}
                    className="text-sage-300 hover:text-gold-400 transition-colors duration-200"
                    whileHover={{ x: 5 }}
                    onClick={(e) => {
                      e.preventDefault();
                      document.querySelector(link.href)?.scrollIntoView({ behavior: 'smooth' });
                    }}
                  >
                    {link.name}
                  </motion.a>
                </li>
              ))}
            </ul>
          </motion.div>

          {/* Services */}
          <motion.div
            initial={{ opacity: 0, y: 30 }}
            whileInView={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.6, delay: 0.2 }}
            viewport={{ once: true }}
          >
            <h4 className="font-serif text-lg font-semibold mb-6">Principais Serviços</h4>
            <ul className="space-y-3">
              {[
                'Limpeza de Pele',
                'Peeling Químico',
                'Microagulhamento',
                'Drenagem Linfática',
                'Massagem Relaxante',
                'Harmonização Facial',
              ].map((service, index) => (
                <li key={index}>
                  <span className="text-sage-300">{service}</span>
                </li>
              ))}
            </ul>
          </motion.div>

          {/* Contact Info */}
          <motion.div
            initial={{ opacity: 0, y: 30 }}
            whileInView={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.6, delay: 0.3 }}
            viewport={{ once: true }}
          >
            <h4 className="font-serif text-lg font-semibold mb-6">Contato</h4>
            <div className="space-y-4">
              <div className="flex items-start space-x-3">
                <MapPin className="text-gold-400 mt-1" size={18} />
                <div>
                  <p className="text-sage-300">Rua das Flores, 123</p>
                  <p className="text-sage-300">Jardins - São Paulo/SP</p>
                  <p className="text-sage-300">CEP: 01234-567</p>
                </div>
              </div>
              <div className="flex items-center space-x-3">
                <Phone className="text-gold-400" size={18} />
                <p className="text-sage-300">(11) 9999-9999</p>
              </div>
              <div className="flex items-center space-x-3">
                <Mail className="text-gold-400" size={18} />
                <p className="text-sage-300">contato@serenityclinic.com.br</p>
              </div>
            </div>

            {/* Business Hours */}
            <div className="mt-6 bg-sage-700/50 rounded-lg p-4">
              <h5 className="font-medium mb-3">Horário de Funcionamento</h5>
              <div className="space-y-1 text-sm text-sage-300">
                <div className="flex justify-between">
                  <span>Seg - Sex:</span>
                  <span>9h às 18h</span>
                </div>
                <div className="flex justify-between">
                  <span>Sábado:</span>
                  <span>9h às 15h</span>
                </div>
                <div className="flex justify-between">
                  <span>Domingo:</span>
                  <span>Fechado</span>
                </div>
              </div>
            </div>
          </motion.div>
        </div>

        {/* Newsletter */}
        <motion.div
          initial={{ opacity: 0, y: 30 }}
          whileInView={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.6, delay: 0.4 }}
          viewport={{ once: true }}
          className="mt-12 pt-8 border-t border-sage-700"
        >
          <div className="text-center mb-8">
            <h4 className="font-serif text-xl font-semibold mb-2">Newsletter</h4>
            <p className="text-sage-300 mb-6">
              Receba dicas exclusivas de beleza e ofertas especiais diretamente no seu e-mail.
            </p>
            <div className="max-w-md mx-auto flex">
              <input
                type="email"
                placeholder="Seu melhor e-mail"
                className="flex-1 px-4 py-3 rounded-l-lg bg-white text-sage-800 placeholder-sage-400 focus:outline-none focus:ring-2 focus:ring-gold-500"
              />
              <motion.button
                className="bg-gold-500 hover:bg-gold-600 px-6 py-3 rounded-r-lg font-medium transition-colors duration-200"
                whileHover={{ scale: 1.05 }}
                whileTap={{ scale: 0.95 }}
              >
                Inscrever
              </motion.button>
            </div>
          </div>
        </motion.div>

        {/* Bottom Bar */}
        <div className="mt-12 pt-8 border-t border-sage-700">
          <div className="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
            <div className="flex items-center space-x-2 text-sage-300">
              <span>© {currentYear} Serenity Clinic. Todos os direitos reservados.</span>
              <Heart className="text-gold-400" size={16} />
            </div>
            <div className="flex space-x-6 text-sm">
              <a href="#" className="text-sage-300 hover:text-gold-400 transition-colors duration-200">
                Política de Privacidade
              </a>
              <a href="#" className="text-sage-300 hover:text-gold-400 transition-colors duration-200">
                Termos de Uso
              </a>
              <a href="#" className="text-sage-300 hover:text-gold-400 transition-colors duration-200">
                Cookies
              </a>
            </div>
          </div>
        </div>
      </div>
    </footer>
  );
};

export default Footer;